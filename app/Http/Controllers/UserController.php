<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest("id")->get();
        return view("admin.index", compact("users"));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "photo"=>"mimes:png,jpeg,jpg|max:2048",
            ]
            );

        $filePath = public_path("uploads");

        if ($request->hasfile("photo")){
            $file = $request->file("photo");
            $file_name = time() . $file->getClientOriginalName();

            $file->move($filePath, $file_name);
            $insert->photo = $file_name;
        }
    }
    
}
