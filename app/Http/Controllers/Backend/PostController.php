<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPost()
    {
        $categories = Category::where('status', 1)->get();
        $posts = Post::all();
        return view('backend.pages.posts.addpost', compact('categories', 'posts'));
    }
    public function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'date' => 'required',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->author;
        $post->category_id = $request->category;
        $post->tags = $request->tags;
        $post->status? $post->status = $request->status:'';
        $post->published_at = $request->date;
        
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
        $categories = Category::where('status',1)->get();
        $user = User::where('id', $post->user_id)->first();
        return view('backend.pages.posts.editpost', compact('post', 'categories', 'user'));
    }
    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'category' => 'required',
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->author;
        $post->category_id = $request->category;
        $post->tags = $request->tags;
        $post->status = $request->status;
        $post->published_at = $request->date;
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
    public function statusPost($id)
    {
        $post = Post::find($id);
        if($post->status == 1){
            $post->status = 0;
        }else{
            $post->status = 1;
        }
        $post->save();
        return redirect('admin/managepost');
    }
}
