<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index(PostCategory $category)
    {
        $cat = $category->post()->orderByDesc('created_at');
        if (request('search')) {
            $cat->where('title', 'like', '%' . request('search') . '%');
        }
        return view('category', [
            'title' => 'Category ' . $category->name,
            'category' => $category,
            'active' => $category->name,
            'posts' => $cat->paginate(5)
        ]);
    }
}
