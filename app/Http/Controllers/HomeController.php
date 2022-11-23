<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    //
    public function __construct(){

    }

    public function index(){
        $data = User::all();
        return view('index', compact('data'));
    }
}
