<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('posts')->orderBy('name')->paginate(30);
        return view('admin.blog.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.blog.tags.form', ['tag' => new Tag()]);
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->validated());
        return redirect()->route('admin.blog.tags.index')->with('ok', 'Tag criada.');
    }

    public function edit(Tag $tag)
    {
        return view('admin.blog.tags.form', compact('tag'));
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        return redirect()->route('admin.blog.tags.index')->with('ok', 'Tag atualizada.');
    }

    public function destroy(Tag $tag)
    {
        $tag->posts()->detach();
        $tag->delete();
        return back()->with('ok', 'Tag excluída.');
    }
}
