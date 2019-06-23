<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $name = auth()->user()->name;

        return view('admin.home.index',compact('name'));
    }
}
