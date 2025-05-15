<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//import model product
use App\Models\History; 

//import return type View
use Illuminate\View\View;

class HistoryController extends Controller
{
    public function index() : View
    {
        //get all products
        $History = History::latest()->paginate(10);

        //render view with History
        return view('History.index', compact('History'));
    }
}
