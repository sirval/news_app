<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestNews = NewsPost::orderBy('id', 'desc')->first(); // gets last record in news table
        if(! $latestNews)
        {
            return redirect()->route('/')
            ->withErrors(__('An Error occured while trying to process your request'));
     
        }
        else
        {
            return view('index', [
                'latestNews' => $latestNews,
                
            ]);
         }
      
    }
}
