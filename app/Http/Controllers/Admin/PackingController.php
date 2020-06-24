<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Packing;
class PackingController extends Controller
{
    public function index()
    {
        $nameToForeach = Packing::all();
        $title = 'Packing';
        $name= 'packing';
        $another = '';
        return view('admin.show',compact('title','nameToForeach','name','another'));
    }

}
