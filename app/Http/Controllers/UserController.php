<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User; 

//import return type View
use Illuminate\View\View;

class UserController extends Controller
{
    public function index() : View
    {
        //get all products
        $users = User::latest()->paginate(10);

        //render view with User
        return view('user.index', compact('users'));
    }
    public function create() : View
    {
    }
}
