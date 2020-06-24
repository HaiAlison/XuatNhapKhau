<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Incoterm;
class IncotermController extends Controller
{
    public function index()
    {
        $nameToForeach = Incoterm::all();
        $title = 'Incoterm';
        $name= 'incoterms';
        $another = '';
        return view('admin.show',compact('title','nameToForeach','name','another'));
    }
}
