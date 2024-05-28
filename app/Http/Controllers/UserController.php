<?php

namespace App\Http\Controllers;

use App\Http\Resources\SearchUserCollection;
use App\Models\User;

class UserController extends Controller
{
    public function search_student(String $search){
        $user = User::where('name', 'like', '%'.$search.'%')
        ->orWhere('id', $search)
        ->get();
        //EndPoint: (get) api/search-student/cadena
        if($user->isEmpty()){
            return response()->json([
                'status' => 404,
                'message' => 'User not Found',
            ], 404);
        } else {
            return new SearchUserCollection($user);
        }
    }

    public function search_notes_by_student(String $search){
        //pendiente: 
    }
}
