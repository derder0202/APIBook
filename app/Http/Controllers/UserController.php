<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class UserController extends Controller
{
    //
    function index(): \Illuminate\Database\Eloquent\Collection
    {
        return User::all();
    }
    function getAUser(string $id){
        return (new User)->find($id);
    }
    function addUser(Request $request){
//        try {
//            $user->create($request->all());
//        }catch (\Exception $e){
//            print_r($e->getMessage());
//        }

        return (new User)->create($request->all());
    }

    function updateUser(Request $request,string $id){
        $user = null;
        try {
            $user = (new User)->find($id);
                $user->update($request->all());
        } catch (\Exception $e){
            print_r($e->getMessage());
        }
        return $user;
    }

    function deleteUser(string $id){
        $user = null;
        try {
            $user = (new User)->find($id)->delete();
        } catch (\Exception $e){
            print_r($e->getMessage());
        }
        return $user?"Xóa thành công":"Xóa thất bại";
    }
}
