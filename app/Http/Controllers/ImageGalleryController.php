<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    private $_pages = 'backend.gallery.';

    public function index()
    {
        return view($this->_pages . 'index');
    }
}
