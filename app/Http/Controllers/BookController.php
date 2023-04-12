<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use DemeterChain\B;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function Psy\debug;

class BookController extends Controller
{
    //
    public function index(){
        $books = Book::all();
        //$books['imgs'] = json_decode($books['imgs']);
        foreach ($books as $book){
            $book["imgs"] = json_decode( $book["imgs"]);
        }

        return $books;
    }
    public function getAbook(string $id){
        return (new Book)->find($id);
    }

    public function addBook(Request $request){

        $book = (new Book)->create($request->all());

       // $book->create()
        $imgs = [];
        $files = $request->file('images');
        if($request->hasFile('images')){
            foreach ($files as $key => $file){
                $filename = $file->getClientOriginalName();
                $file->storeAs("/uploads/".$book['_id'].'/',$filename);
                $imgs[] = $request->fullUrl().'/'. $book['_id'].'/'.$filename;
                //return $file->getClientOriginalName();
            }
           // return count($files);
        }
        //$book->setAttribute("imgs",json_encode($imgs));
        $mainImg = $imgs[0];
        array_shift($imgs);
        $book->update(['imgs'=>json_encode($imgs),'mainImg'=>$mainImg]);

        //return (new Book)->create([...$request->all(),$mainImg,$imgs]);
        return $book;
    }

    public function getImageBook(string $idBook,string $filename){
        return response()->file("../storage/app/uploads/$idBook/$filename");
    }

    public function updateBook(Request $request, string $id): string
    {
        return (new Book)->find($id)->update($request->all())?"updated":"update fail";
    }
    public function deleteBook(Request $request, string $id): string
    {
        File::deleteDirectory("../storage/app/uploads/$id");
        return (new Book)->find($id)->delete()?"deleted":"delete fail";
    }
}
