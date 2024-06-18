<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::latest();

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        return view('index', [
            'title' => 'Artikel Kegiatan Mahasiswa',
            'page'  => 'Semua Artikel',
            'posts' => $posts->paginate(6),
            'active' => '/'
        ]);
    }

    public function show(Post $post)
    {
        $postcat = Post::with('category')->findOrFail($post->id);
        // dd($post->category->slug);
        $posts = Post::latest();

        return view('post', [
            'title' => $post->title,
            'post' => $post,
            'postcat' => $postcat,
            'posts' => $posts->paginate(6),
        ]);
    }
}
