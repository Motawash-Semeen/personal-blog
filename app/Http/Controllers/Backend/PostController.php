<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost()
    {
        $categories = Category::all();
        return view('backend.pages.posts.addpost', compact('categories'));
    }
    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'image' => 'required',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('backend/images/post/', $filename);
            $post->image = $filename;
        }	
        $post->save();
        session()->flash('message', 'Post Added Successfully');
        return redirect('admin/managepost');
    }
    public function managePost()
    {
        $posts = Post::all();
        return view('backend.pages.posts.manageposts', compact('posts'));
    }
    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/managepost');
    }
    public function editPost($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('backend.pages.posts.editpost', compact('post', 'categories'));
    }
    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        if($request->hasFile('image')){
            if(file_exists('backend/images/post/'.$post->image)){
                unlink('backend/images/post/'.$post->image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time() . '.' . $extension;
            $file->move('backend/images/post/', $filename);
            $post->image = $filename;
        }	
        $post->save();
        session()->flash('message', 'Post Updated Successfully');
        return redirect('admin/managepost');
    }
}
