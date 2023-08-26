<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments=Comments::with('post')->get();
        return view('backend.pages.comments.managecomments',compact('comments'));
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
        $posts = Post::where('status',1)->get();
        $comment = Comments::with('post')->find($id);
        return view('backend.pages.comments.editcomments',compact('comment', 'posts'));
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
        $comment=Comments::find($id);
        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->comment=$request->comment;
        $request->website ? $comment->website=$request->website: '';
        $comment->post_id=$request->post_id;
        $comment->status=$request->status;
        $comment->save();
        return redirect('admin/comments')->with('message','Comment Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comments::find($id);
        $comment->delete();
        return redirect('admin/comments');
    }
    public function status($id)
    {
        $comment = Comments::find($id);
        if($comment->status == 1){
            $comment->status = 0;
        }else{
            $comment->status = 1;
        }
        $comment->save();
        return redirect('admin/comments');
    }
}
