<?php

namespace App\Http\Controllers;

use App\Iklan;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $iklan = Iklan::all();
        return view('home', compact('iklan'));
    }
}
