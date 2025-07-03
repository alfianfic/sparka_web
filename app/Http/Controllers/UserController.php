<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Fingerprint;


//import return type View
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function index() : View
    {
        //get all products
        $users = User::latest()->paginate(10);

        //render view with User
        return view('user.index', compact('users'));
    }
    public function show($id) {
        $user = User::findOrFail($id);
        return view('user.show',compact('user'));
    }
    public function getProfilUpdate($id) {
    // $user = User::findOrFail($id);
    $user = User::where('id', $id)->first();
if (!$user) {

    \Log::error("User dengan ID $id tidak ditemukan.");
    return response()->json(['error' => 'User tidak ditemukan'], 404);
}

    return response()->json([
        'FEV1' => $user->FEV1,
        'FVC' => $user->FVC,
        'CO' => $user->CO,
        'FEV1_FVC' => $user->FVC > 0 ? number_format(($user->FEV1 / $user->FVC) * 100, 2) : '-'
    ]);
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
            'gender'         => 'required|string',
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
            'gender'         => $request->gender,
            'height'         => $request->height,
            'weight'         => $request->weight,
        ]);

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get product by ID
        $user = User::with('fingerprint')->findOrFail($id);

        //render view with product
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'         => 'required|min:5',
            'email'   => 'required|min:10',
            'age'         => 'required|numeric',
            'gender'         => 'required|string',
            'height'         => 'required|numeric',
            'weight'         => 'required|numeric',
            'CO'         => 'required|numeric',
            'FEV1'         => 'required|numeric',
            'FEV1_max'         => 'required|numeric',
            'FVC'         => 'required|numeric',
            'FVC_max'         => 'required|numeric',
            'status'         => 'required|numeric',
            // 'id_finger'      => 'unique:fingerprints,id_fingerprint',
            // 'password'      => 'string'
        ]);

        $request->validate([
            'id_finger' => [
                Rule::unique('fingerprints', 'id_fingerprint')->ignore($id, 'id_fingerprint'), // $id = id dari row fingerprint
            ],
        ]);


        //get product by ID
        $user = User::findOrFail($id);

        $user->update([
            'name'         => $request->name,
            'email'   => $request->email,
            'age'         => $request->age,
             'gender'         => $request->gender,
            'height'         => $request->height,
            'weight'         => $request->weight,
            'CO'         => $request->CO,
            'FEV1'         => $request->FEV1,
            'FEV1_max'         => $request->FEV1_max,
            'FVC'         => $request->FVC,
            'FVC_max'         => $request->FVC_max,
            'status'         => $request->status,
            // 'password'         => $request->password,
        ]);
        
        if(isset($password)){
            $user->update([
                'password'=>$password,
            ]);
        }

        if(isset($request->id_finger)){
            Fingerprint::updateOrCreate(
                ['user_id' => $id],
                [
                    'user_id'      => $id,
                    'id_fingerprint' => $request->id_finger
                ]
            );

        }
        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $user = User::findOrFail($id);

        //delete user
        $user->delete();

        //redirect to index
        return redirect()->route('users.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function home() : View
    {
        //get all products
        $users = User::all();

        //render view with User
        return view('user.home', compact('users'));
    }
}

