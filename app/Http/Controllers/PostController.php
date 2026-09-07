<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        $query = Post::latest();

    //     if (auth()->check() && !auth()->user()->is_admin) {
    //     // $query->where('user_id', auth()->id());
    // }

    return view('posts.index', [
        'posts' => $query->filter(
            request(['search', 'category', 'author'])
        )->paginate(18)->withQueryString()
    ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'       => 'required|string|max:255',
            'excerpt'     => 'required|string',
            'body'        => 'required|string',
            'category_id' => 'required',
            'thumbnail'   => 'required|image',
        ]);

        if ($request->hasFile('thumbnail')) {
            $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }

        // Agar user logged in na ho, to default User ID 1 assign hogi
        $attributes['user_id'] = auth()->id() ?? 1;

        Post::create($attributes);


         return response()->json([
        'success' => true,
        'message' => $request->status === 'published'
            ? 'Post published successfully!'
            : 'Post saved as draft!',
         
    ]);

        return redirect()->route('home')->with('success', 'Post successfully created!');
    }

    public function edit(Post $post)
    {
       $categories = Category::all(); // Category select box populate karne ke liye
    
    return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title'       => 'required|string|max:255',
            'excerpt'     => 'required|string',
            'body'        => 'required|string',
            'category_id' => 'required',
            'thumbnail'   => 'nullable|image',
        ]);

        if ($request->hasFile('thumbnail')) {
            if($post->thumbnail){
            \Illuminate\Support\Facades\Storage::delete($post->thumbnail);
            }
        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);

        return redirect()->route('home')->with('success', 'Post Updated Successfully!');
    }
    public function show(Post $post){
        // dd($post);
        return view('components.more-data' ,[
            'post' => $post
        ]);
    }
    public function delete(Post $post){

    // if ($post->user_id !== auth()->id()) {
    if(!auth()->user()->is_admin && $post->user_id !== auth()->id()){
        abort(403 , 'You can delete your posts only');
    }
    $post->delete();
    return redirect('/')->with('success','Post delete successfuly');
    }
}