<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = Post::published()->orderByDesc('published_at')->get();
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        $content = view('blog.sitemap', compact('posts', 'categories', 'tags'))->render();

        return response($content, 200)->header('Content-Type', 'application/xml');
    }

    public function robots()
    {
        $lines = [
            'User-agent: *',
            'Allow: /',
            'Disallow: /admin',
            '',
            'Sitemap: '.url('/sitemap.xml'),
        ];

        return response(implode("\n", $lines), 200)->header('Content-Type', 'text/plain');
    }
}
