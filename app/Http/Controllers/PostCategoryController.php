<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index(PostCategory $category, Request $request)
    {
        $cat = $category->post()->orderByDesc('created_at');
        if (request('search')) {
            $cat->where('title', 'like', '%' . request('search') . '%');
        }
        $data = [
            'title' => 'Category ' . $category->name,
            'category' => $category,
            'active' => $category->name,
            'posts' => $cat->paginate(5)
        ];

        if (auth()->check()) {
            $data['profile'] = $request->user()->profile;
        }

        return view('category', $data);
    }
}
