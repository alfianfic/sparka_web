<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\History;

//import return type View
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;

class HistoryController extends Controller
{
    public function index() : View
    {
        //get all products
        $history = History::latest()->with('user')->paginate(10);

        //render view with History
        return view('history.index', compact('history'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);

        // Ambil semua history milik user tersebut
        $history = History::where('user_id', $id)->with('user')->get();

        // Tampilkan ke view
        return view('history.show', compact('history','id'));
    }
    public function showGet($id)
    {
        $historyyy = History::where('user_id', $id)->with('user')->get();
        return response()->json($historyyy);
    }
    public function create() : View
    {
        $users = User::all(); // atau bisa juga ->pluck('name', 'id') jika ingin langsung dipakai
    return view('history.create', compact('users'));

    }
     public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
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
        History::create([
            // 'image'         => $image->hashName(),
            'CO'         => $request->CO,
            'FEV1'   => $request->FEV1,
            'FVC'         => $request->FVC,
            'user_id'         => $request->user_id,
            'Date'         => $request->Date,
            'Status'         => $request->Status,
        ]);

        //redirect to index
        return redirect()->route('history.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id): View
    {
        //get product by ID
        $history = History::findOrFail($id);

        //render view with product
        return view('history.edit', compact('history'));
    }
    public function update(Request $request, $id): RedirectResponse
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
        return redirect()->route('history.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $history = History::findOrFail($id);

        //delete history
        $history->delete();

        //redirect to index
        return redirect()->route('history.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function home() : View
    {
        //get all products
        $history = History::all();

        //render view with History
        return view('history.home', compact('history'));
    }
}

