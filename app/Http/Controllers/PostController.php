<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $posts = Post::all();
        return view('post-create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required|string|max:300',
            'image' => 'required|image|mimes:jpeg,png,webp',
            'body' => 'required|string|max:2000',
        ]);

        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        Post::create($data);
        return back()->with('success', 'Post created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        return view('post-edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Post $post)
{
    $data = $request->validate([
        'title' => 'required|string|max:300',
        'image' => 'nullable|image|mimes:jpeg,png,webp',
        'body' => 'required|string|max:2000',
    ]);

    // Kiểm tra nếu người dùng có upload ảnh
    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu có
        if ($post->image) {
            $oldImagePath = public_path('images/' . $post->image);
            if (\File::exists($oldImagePath)) {
                \File::delete($oldImagePath);
            }
        }

        // Lưu ảnh mới
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        $data['image'] = $imageName;
    }

    $post->update($data);
    return redirect()->route('post.create')->with('success_update', 'Post updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
public function destroy(Post $post)
{
    if ($post->image) {
        $destination = 'images/' . $post->image;
        if (\File::exists($destination)) {
            \File::delete($destination);
        }
    }

    $post->delete(); 
    return back()->with('success_delete', 'Post deleted successfully.');
}

}
