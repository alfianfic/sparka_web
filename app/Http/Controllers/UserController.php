<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User; 

//import return type View
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


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
    return view('user.create');

    }
     public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            // 'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name'         => 'required|min:5',
            'email'   => 'required|min:10',
            'age'         => 'required|numeric',
            'height'         => 'required|numeric',
            'weight'         => 'required|numeric',
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('products', $image->hashName());

        //create product
        User::create([
            // 'image'         => $image->hashName(),
            'name'         => $request->name,
            'email'   => $request->email,
            'age'         => $request->age,
            'height'         => $request->height,
            'weight'         => $request->weight,
        ]);

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}

