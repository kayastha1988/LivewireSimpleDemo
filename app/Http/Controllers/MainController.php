<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $_pages='articles.';

    
    public function mainPage()
    {
        return view('welcome');
    }

    public function article()
    {
        return view($this->_pages.'index');
    }

    public function addArticle()
    {
        return view($this->_pages.'create');
    }

    public function editArticle($id)
    {
        // $data=Article::where('id',$id)->first();
        return view($this->_pages.'edit');
    }
}
