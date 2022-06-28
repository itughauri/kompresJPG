<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        Session::forget('user.uploads');
        Session::forget('user.size');
        Session::forget('user.uploads');
        Session::forget('user.temp');
        Session::forget('user.uploadimg');
        Session::forget('optimize.size');
        Session::forget('user.filesize');
        Session::forget('opt');
        return view('layouts.app');
    }
}
