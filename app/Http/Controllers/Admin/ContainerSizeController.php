<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContainerSize;
class ContainerSizeController extends Controller
{
    public function index()
    {
        $nameToForeach = ContainerSize::all();
        $title = 'Container Size';
        $name= 'container_size';
        $another = '';
        return view('admin.show',compact('title','nameToForeach','name','another'));
    }
}
