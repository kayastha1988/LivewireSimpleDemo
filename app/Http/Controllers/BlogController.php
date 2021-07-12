<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $_pages='backend.blogs.';

    public function index()
    {
        return view($this->_pages.'index');
    }
}
