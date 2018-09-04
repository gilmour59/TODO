<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class PagesController extends Controller
{
    public function new(){
        return view('new');
    }
}
