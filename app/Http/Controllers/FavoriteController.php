<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //
    public function addFavoriteBook(Request $request){
        return (new Favorite)->create($request->all());
    }

    public function removeFavoriteBook(string $idUser,$idBook){
        $favorite = (new Favorite)->where('idUser','=',$idUser)
            ->where('idBook','=',$idBook)->delete();
        return $favorite?"removed":"fail";
    }

    public function getFavoriteBookFromUser(string $idUser){
        $favorites = (new Favorite)->where("idUser",'=',$idUser)
            ->join("books",'books._id','=','favorites.idBook')
            //->select('idBook','idUser','date')
            ->get();
        foreach ($favorites as $favo){
            $favo["imgs"] = json_decode( $favo["imgs"]);
        }
        return $favorites;
    }
}
