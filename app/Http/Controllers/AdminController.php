<?php

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allNews = NewsPost::all()->sortByDesc('id'); // gets all record in news table in descending order
        
        return view('admin.index', [
            'allNews' => $allNews,
        ]);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
           ]);
           if($file = $request->hasFile('image'))
           {
            $file = $request->file('image') ;
            $fileName = date('YmdHi').'_'.$file->getClientOriginalName() ;
            $destinationPath = storage_path('app/public/uploads') ;
            $file->move($destinationPath,$fileName);
            //$filename = $request->file('image').date('YmdHi');
                $newNews = NewsPost::create([
                    'title' => $request->title,
                    'body' => $request->body,
                    'filepath' =>$fileName,
                    'user_id' => auth()->user()->id,
                ]);
                return redirect()->route('admin.index')
                ->withSuccess(__('News Added Successfully'));
            }
            else
            {
                return redirect()->route('admin.create')
                ->withErrors(__('An Error occured while trying to process your request'));
            }
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function show(NewsPost $newsPost)
    {
        return view('admin.show', [
            'news' => $newsPost,
           
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsPost $newsPost)
    {
        return view('admin.edit', [
            'news' => $newsPost,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsPost $newsPost)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:2048',
           ]);

           $file = $request->hasFile('image');

           if($file){
               $file = $request->file('image') ;
               $fileName = date('YmdHi').'_'.$file->getClientOriginalName() ;
               $destinationPath = storage_path('app/public/uploads') ; 
               $imgName = NewsPost::find($newsPost->id);
               unlink('storage/uploads/'.$imgName->filepath);
               $file->move($destinationPath,$fileName);
               $newsPost -> update([
                   'title' => $request->title,
                   'body' => $request->body,
                   'filepath' => $fileName,
               ]);
   
           }

           if(!$file){
                $newsPost -> update([
                    'title' => $request->title,
                    'body' => $request->body,
                ]);
           }

        
        return redirect()->back()->withSuccess(__('News Updated successfully.'));
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsPost  $newsPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsPost $newsPost)
    {

        $news = NewsPost::find($newsPost->id);
        unlink('storage/uploads/'.$news->filepath);
        $news->delete();
        
        return redirect()->route('admin.index')
         ->withSuccess(__('News deleted successfully.'));
    }
}
