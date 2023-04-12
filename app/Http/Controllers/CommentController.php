<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function addComment(Request $request){
        return (new Comment)->create($request->all());
    }
    public function getBookComment(string $idBook){
        $comment = (new Comment)->where("idBook",'=',$idBook)
            ->join("users",'users.username','=','comments.idUser')
            ->select('idBook','idUser','content','date','fullName')
            ->get();
        return $comment;
    }

    public function updateComment(string $id,Request $request){
        return (new Comment)->find($id)->update($request->all())?"updated":"update fail";
    }

    public function deleteComment(string $id,Request $request){
        return (new Comment)->find($id)->delete()?"deleted":"delete fail";
    }


}
