<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    private $_pages = 'backend.testimonials.';

    public function index()
    {
        return view($this->_pages . 'index');
    }
}
