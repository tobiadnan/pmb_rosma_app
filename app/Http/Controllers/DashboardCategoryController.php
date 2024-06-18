<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index', [
            'categories' => PostCategory::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories',
            'body' => 'required'
        ]);

        $validated['body'] = Str::limit(strip_tags($request->body), 30);
        $validated['user_id'] = auth()->user()->id;

        PostCategory::create($validated);
        return redirect('/admin/category')->with('success', 'Category Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostCategory $category)
    {
        $rules = [
            'name' => 'required|max:255',
            'body' => 'required'
        ];

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:category';
        }

        $validated = $request->validate($rules);

        $validated['body'] = Str::limit(strip_tags($request->body), 30);
        $validated['user_id'] = auth()->user()->id;

        PostCategory::where('slug', $category->slug)
            ->update($validated);

        return redirect('admin/category')->with('success', 'Category Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $category)
    {
        PostCategory::destroy($category->id);
        return redirect('/admin/category')->with('success', 'Berhasil Menghapus Category');
    }
}
