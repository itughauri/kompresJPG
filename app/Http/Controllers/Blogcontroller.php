<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Blogcontroller extends Controller
{
    public function index()
    {
        $website = strtolower(env('WEBSITE'));
        $blog = file_get_contents('https://appstore.dzinemedia.com/api/blogs/'.$website);
        $blogs = json_decode($blog , true);
        $blogs=$blogs['data'];
        return view('blogs.app');
    }
}
