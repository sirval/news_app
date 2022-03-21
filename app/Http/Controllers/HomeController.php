<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = NewsPost::orderBy('id', 'desc')->first(); // gets last record in news table
       
            return view('index', [
                'latestNews' => $latestNews,
                
            ]);
        
    }
}
