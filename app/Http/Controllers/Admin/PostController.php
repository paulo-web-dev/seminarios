<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $q      = trim((string) $request->query('q'));

        $posts = Post::with('category')
            ->when($status, fn ($query) => $query->where('status', $status))
            ->when($q !== '', fn ($query) => $query->where('title', 'like', "%{$q}%"))
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.blog.posts.index', compact('posts', 'status', 'q'));
    }

    public function create()
    {
        return view('admin.blog.posts.form', [
            'post'       => new Post(['status' => 'draft', 'author' => 'Equipe Unyflex']),
            'categories' => Category::orderBy('name')->get(),
            'tagsValue'  => '',
        ]);
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        $this->fill($post, $request);
        $post->save();
        $this->syncTags($post, $request->input('tags'));
        Cache::forget('blog.sidebar');

        return redirect()->route('admin.blog.posts.index')->with('ok', 'Artigo criado com sucesso.');
    }

    public function edit(Post $post)
    {
        return view('admin.blog.posts.form', [
            'post'       => $post,
            'categories' => Category::orderBy('name')->get(),
            'tagsValue'  => $post->tags->pluck('name')->implode(', '),
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->fill($post, $request);
        $post->save();
        $this->syncTags($post, $request->input('tags'));
        Cache::forget('blog.sidebar');

        return redirect()->route('admin.blog.posts.index')->with('ok', 'Artigo atualizado.');
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();
        Cache::forget('blog.sidebar');

        return back()->with('ok', 'Artigo excluído.');
    }

    private function fill(Post $post, PostRequest $request): void
    {
        $post->fill($request->only([
            'title', 'slug', 'excerpt', 'content', 'category_id',
            'author', 'status', 'meta_title', 'meta_description', 'focus_keyword',
        ]));

        $post->published_at = $request->filled('published_at')
            ? $request->date('published_at')
            : $post->published_at;

        if ($request->hasFile('featured_image')) {
            $dir = public_path('uploads/blog');
            if (! is_dir($dir)) {
                @mkdir($dir, 0775, true);
            }
            $file = $request->file('featured_image');
            $name = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                .'-'.Str::random(6).'.'.$file->getClientOriginalExtension();
            $file->move($dir, $name);
            $post->featured_image = 'uploads/blog/'.$name;
        }
    }

    private function syncTags(Post $post, ?string $tags): void
    {
        $names = collect(explode(',', (string) $tags))
            ->map(fn ($t) => trim($t))
            ->filter()
            ->unique();

        $ids = $names->map(function ($name) {
            return Tag::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name])->id;
        })->all();

        $post->tags()->sync($ids);
    }
}
