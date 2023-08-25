<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
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
        $home = HomeSection::find(1);
        return view('backend.pages.homesection.managesection',compact('home'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
       $home = HomeSection::find(1);
       $home->time_zone = $request->time_zone;
       $home->default_language = $request->default_language;
       $home->site_name = $request->site_name;
       $home->site_email = $request->site_email;
       $home->site_description = $request->site_description;
       $home->site_keywords = $request->site_keywords;
       $home->site_copyright = $request->site_copyright;
       $home->web_fb_link = $request->web_fb_link;
       $home->web_twitter_link = $request->web_twitter_link;
       $home->web_instagram_link = $request->web_instagram_link;
       $home->web_linkedin_link = $request->web_linkedin_link;
       $home->web_youtube_link = $request->web_youtube_link;

       if($request->hasFile('site_logo')){
        if(file_exists('backend/images/logo/'.$home->site_logo)){
            unlink('backend/images/logo/'.$home->site_logo);
        }
        $file = $request->file('site_logo');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '-logo.' . $extension;
        $file->move('backend/images/logo/', $filename);
        $home->site_logo = $filename;
    }
       if($request->hasFile('site_favicon')){
        if(file_exists('backend/images/favicon/'.$home->site_favicon)){
            unlink('backend/images/favicon/'.$home->site_favicon);
        }
        $file = $request->file('site_favicon');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '-icon.' . $extension;
        $file->move('backend/images/favicon/', $filename);
        $home->site_favicon = $filename;
    }
       $home->save();
       session()->flash('message', 'Home Section Updated Successfully');
       return redirect('admin/homeSection');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
