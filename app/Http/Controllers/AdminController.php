<?php

namespace App\Http\Controllers;


use App\Models\NewsPost;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
           // Upload an Image File to Cloudinary with One line of Code
           $result = Cloudinary::upload($request->file('image')->getRealPath());

           $filepath = $result->getSecurePath(); // Get the url of the uploaded file; https
           $publicId = $result->getPublicId(); // Get the public_id of the uploaded file
            
           if ($result){
                $newNews = NewsPost::create([
                    'title' => $request->title,
                    'body' => $request->body,
                    'public_id' => $publicId,
                    'filepath' =>$filepath,
                    'user_id' => auth()->user()->id,

                   
                ]);
                return redirect()->route('admin.index')
                ->withSuccess('News Added Successfully');
            }
            else
            {
                return redirect()->route('admin.create')
                ->withErrors('An Error occured while trying to process your request');
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
        
        $imgName = NewsPost::find($newsPost->id);
        $publicId = $imgName->public_id;
        //delete already existing image and set it to new selected image
        Cloudinary::destroy($publicId);
         // Upload an Image File to Cloudinary with One line of Code
        $result = Cloudinary::upload($request->file('image')->getRealPath());
        $filepath = $result->getSecurePath(); // Get the url of the uploaded file; https
        $publicId = $result->getPublicId(); // Get the public_id of the uploaded file
        $newsPost -> update([
            'title' => $request->title,
            'body' => $request->body,
            'public_id' => $publicId,
            'filepath' => $filepath,
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

        $imgName = NewsPost::find($newsPost->id);
        $publicId = $imgName->public_id;
        //delete image from cloudinary
        Cloudinary::destroy($publicId);
        NewsPost::where('id', $imgName->id)->delete();
        
        return redirect()->route('admin.index')
         ->withSuccess(__('News deleted successfully.'));
    }
}
