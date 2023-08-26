<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = SiteSettings::find(1);
        return view('backend.pages.sitesettings.managesite',compact('site'));
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
        $site = SiteSettings::find(1);
       $site->time_zone = $request->time_zone;
       $site->default_language = $request->default_language;
       $site->site_name = $request->site_name;
       $site->site_email = $request->site_email;
       $site->site_description = $request->site_description;
       $site->site_keywords = $request->site_keywords;
       $site->site_copyright = $request->site_copyright;
       $site->web_fb_link = $request->web_fb_link;
       $site->web_twitter_link = $request->web_twitter_link;
       $site->web_instagram_link = $request->web_instagram_link;
       $site->web_linkedin_link = $request->web_linkedin_link;
       $site->web_youtube_link = $request->web_youtube_link;

       if($request->hasFile('site_logo')){
        if(file_exists('backend/images/logo/'.$site->site_logo)){
            unlink('backend/images/logo/'.$site->site_logo);
        }
        $file = $request->file('site_logo');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '-logo.' . $extension;
        $file->move('backend/images/logo/', $filename);
        $site->site_logo = $filename;
    }
       if($request->hasFile('site_favicon')){
        if(file_exists('backend/images/favicon/'.$site->site_favicon)){
            unlink('backend/images/favicon/'.$site->site_favicon);
        }
        $file = $request->file('site_favicon');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '-icon.' . $extension;
        $file->move('backend/images/favicon/', $filename);
        $site->site_favicon = $filename;
    }
       $site->save();
       session()->flash('message', 'Site Section Updated Successfully');
       return redirect('admin/site-settings');
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
