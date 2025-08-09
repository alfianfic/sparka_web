<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\History; 

//import return type View
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\HistoryResource;
use Illuminate\Support\Facades\Validator;

class HistoryController extends Controller
{
    public function index() 
    {
        //get all products
        $history = History::latest()->with('user')->paginate(10);

        //render view with History
       return new HistoryResource(true, 'List Data History', $history);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);

        // Ambil semua history milik user tersebut
        $history = History::where('user_id', $id)->with('user')->get();

        // Tampilkan ke view
        return new HistoryResource(true, 'List Data History', $history);
    }  
    public function store(Request $request)
    {
        //validate form
        $validator = Validator::make($request->all(), [
            // 'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'CO'         => 'required',
            'FEV1'   => 'required',
            'FVC'         => 'required',
            'user_id'         => 'required',
            'Date'         => 'required',
            'Status'         => 'required',
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('products', $image->hashName());

        //create product
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $history = History::create([
            // 'image'         => $image->hashName(),
            'CO'         => $request->CO,
            'FEV1'   => $request->FEV1,
            'FVC'         => $request->FVC,
            'user_id'         => $request->user_id,
            'Date'         => $request->Date,
            'Status'         => $request->Status,
        ]);

        //redirect to index
        return new HistoryResource(true, 'Data History Berhasil Ditambahkan!', $history);
    } 
    public function update(Request $request, $id)
    {
        //validate form
        $request->validate([
            'CO'         => 'required',
            'FEV1'   => 'required',
            'FVC'         => 'required',
            'Name'         => 'required',
            'Date'         => 'required',
            'Status'         => 'required',
        ]);

        //get product by ID
        $history = History::findOrFail($id);

        $history->update([
             'CO'         => $request->CO,
            'FEV1'   => $request->FEV1,
            'FVC'         => $request->FVC,
            'Name'         => $request->Name,
            'Date'         => $request->Date,
            'Status'         => $request->Status,
        ]);

        //redirect to index
        return new HistoryResource(true, 'Update Berhasil', $history);
    }
    public function destroy($id)
    {
        //get product by ID
        $history = History::findOrFail($id);

        //delete history
        $history->delete();

        //redirect to index
        return new HistoryResource(true, 'Delete History Berhasil', $history);
    }

    // public function create() 
    // {
    //     $users = User::all(); // atau bisa juga ->pluck('name', 'id') jika ingin langsung dipakai
    //     return view('history.create', compact('users'));

    // }

    // public function edit(string $id)
    // {
    //     //get product by ID
    //     $history = History::findOrFail($id);

    //     //render view with product
    //     return new HistoryResource(true, 'List Data History', $history);
    // }
    // public function home() 
    // {
    //     //get all products
    //     $history = History::all();

    //     //render view with History
    //     return view('history.home', compact('history'));
    // }
}

