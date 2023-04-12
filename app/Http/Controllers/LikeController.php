<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function addLike(Request $request){
        return (new Like)->create($request->all());
    }
    public function unLike(string $idUser,$idBook){
        $like = (new Like)->where('idUser','=',$idUser)
            ->where('idBook','=',$idBook)->delete();
        return $like?"unliked":"fail";
    }

    public function getBookLike(string $idBook){
        $like = (new Like)->where("idBook",'=',$idBook)
            //->join("users",'users.username','=','likes.idUser')
            //->select('idBook','idUser','date')
            ->get();
        return $like;
    }
}
