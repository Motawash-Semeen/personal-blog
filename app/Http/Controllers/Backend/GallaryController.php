<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallary;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallaries = Gallary::all();
        return view('backend.pages.gallaries.managegallaries', compact('gallaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.gallaries.addgallaries');
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
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    
    $gallary = new Gallary;

    $gallary->status = $request->status;

    if($request->hasFile('image')){
     if(file_exists('backend/images/gallary/'.$gallary->image)){
         unlink('backend/images/gallary/'.$gallary->image);
     }
     $file = $request->file('image');
     $extension = $file->getClientOriginalExtension(); // getting image extension
     $filename = time() . '-gallary.' . $extension;
     $file->move('backend/images/gallary/', $filename);
     $gallary->image = $filename;
 }

    $gallary->save();
    session()->flash('message', 'gallary Section Updated Successfully');
    return redirect('admin/home-gallaries');
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
        $gallary = Gallary::find($id);
        return view('backend.pages.gallaries.editgallaries', compact('gallary'));
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
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    
    $gallary =  Gallary::find($id);

    $gallary->status = $request->status;

    if($request->hasFile('image')){
     if(file_exists('backend/images/gallary/'.$gallary->image)){
         unlink('backend/images/gallary/'.$gallary->image);
     }
     $file = $request->file('image');
     $extension = $file->getClientOriginalExtension(); // getting image extension
     $filename = time() . '-gallary.' . $extension;
     $file->move('backend/images/gallary/', $filename);
     $gallary->image = $filename;
 }

    $gallary->save();
    session()->flash('message', 'gallary Section Updated Successfully');
    return redirect('admin/home-gallaries');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallary = Gallary::find($id);
        $gallary->delete();
        return redirect('admin/home-gallaries');
    }

    public function status($id)
    {
        $gallary = Gallary::find($id);
        if($gallary->status == 1){
            $gallary->status = 0;
        }else{
            $gallary->status = 1;
        }
        $gallary->save();
        return redirect('admin/home-gallaries');
    }
}
