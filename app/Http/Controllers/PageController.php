<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{

    public function lorem_ipsum()
    {
        return view('lorem_ipsum');
    }

    public function user_generator()
    {
        return view('user_generator');
    }

}
