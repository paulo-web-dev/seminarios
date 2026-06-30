<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->orderBy('name')->paginate(20);
        return view('admin.blog.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog.categories.form', ['category' => new Category()]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        Cache::forget('blog.sidebar');
        return redirect()->route('admin.blog.categories.index')->with('ok', 'Categoria criada.');
    }

    public function edit(Category $category)
    {
        return view('admin.blog.categories.form', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        Cache::forget('blog.sidebar');
        return redirect()->route('admin.blog.categories.index')->with('ok', 'Categoria atualizada.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Cache::forget('blog.sidebar');
        return back()->with('ok', 'Categoria excluída.');
    }
}
