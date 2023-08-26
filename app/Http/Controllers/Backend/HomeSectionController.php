<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status',1)->orderBy('id','desc')->get();
        $homes = HomeSection::all();
        return view('backend.pages.homesections.managesection',compact('homes','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::where('status',1)->orderBy('id','desc')->get();
        $home = HomeSection::find($id);
        return view('backend.pages.homesections.editsection',compact('home','posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
             
                'featured_title' => 'required',
                'featured_post_id' => 'required',
                'featured_status' => 'required',
                'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        $home = HomeSection::find($id);
        $home->featured_title = $request->featured_title;
        $home->featured_post_id = $request->featured_post_id;
        $home->featured_status = $request->featured_status;

 
        if($request->hasFile('featured_image')){
         if(file_exists('backend/images/featured/'.$home->featured_image)){
             unlink('backend/images/featured/'.$home->featured_image);
         }
         $file = $request->file('featured_image');
         $extension = $file->getClientOriginalExtension(); // getting image extension
         $filename = time() . '-featured.' . $extension;
         $file->move('backend/images/featured/', $filename);
         $home->featured_image = $filename;
     }

        $home->save();
        session()->flash('message', 'home Section Updated Successfully');
        return redirect('admin/home-section');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $section = HomeSection::find($id);
        if($section->featured_status == 1){
            $section->featured_status = 0;
        }else{
            $section->featured_status = 1;
        }
        $section->save();
        return redirect('admin/home-section');
    }
}
