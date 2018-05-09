<?php

namespace App\Http\Controllers;

use App\Product;

class MainController extends Controller
{

    public function index()
    {
//        session()->flush();
        return view('index', [
            'newestProduct' => Product::orderBy('created_at', 'desc')->first()
        ]);
    }

    public function indexAdmin()
    {
        return view('admin.main');
    }

    public function contactIndex()
    {
        return view('contact');
    }
}
