<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;

class PostController extends Controller
{

    public function index(Request $request)
    {

        $posts = Post::latest();

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        $data = [
            'title' => 'Artikel Kegiatan Mahasiswa',
            'page'  => 'Semua Artikel',
            'posts' => $posts->paginate(6),
            'active' => '/',
        ];

        if (auth()->check()) {
            $data['profile'] = $request->user()->profile;
        }

        return view('index', $data);
    }

    public function show(Post $post, Request $request)
    {
        $postcat = Post::with('category')->findOrFail($post->id);
        // dd($post->category->slug);
        $posts = Post::latest();
        $data = [
            'title' => $post->title,
            'post' => $post,
            'postcat' => $postcat,
            'posts' => $posts->paginate(6),
        ];

        if (auth()->check()) {
            $data['profile'] = $request->user()->profile;
        }

        return view('post', $data);
    }
}
