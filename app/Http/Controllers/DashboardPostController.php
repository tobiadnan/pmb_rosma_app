<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create', [
            'categories' => PostCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|max:255',
            'slug'          => 'required|unique:posts',
            'post_category_id'   => 'required',
            'image'         => 'image|file|max:1024',
            'body'          => 'required'
        ]);

        if ($request->file('image')) {
            // $validated['image'] = $request->file('image')->store('post-images');
            // Menyimpan file ke storage/app/public/post-images
            $path = $request->file('image')->store('public/post-images');
            // Menyimpan path ke dalam database (tanpa "public/")
            $validated['image'] = str_replace('public/', '', $path);
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 150);

        Post::create($validated);
        return redirect('/admin/posts')->with('success', 'Post Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // dd($post->image);
        return view('admin.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => PostCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title'         => 'required|max:255',
            'post_category_id'   => 'required',
            'image'         => 'image|file|max:1024',
            'body'          => 'required'
        ];


        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validated = $request->validate($rules);

        if ($request->file('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            // $validated['image'] = $request->file('image')->store('post-images');
            // Menyimpan file ke storage/app/public/post-images
            $path = $request->file('image')->store('public/post-images');
            // Menyimpan path ke dalam database (tanpa "public/")
            $validated['image'] = str_replace('public/', '', $path);
        }

        $validated['user_id'] = auth()->user()->id;
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 150);

        Post::where('id', $post->id)
            ->update($validated);

        return redirect('/admin/posts')->with('success', 'Post Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->id);
        return redirect('/admin/posts')->with('success', 'Berhasil Menghapus Post');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
