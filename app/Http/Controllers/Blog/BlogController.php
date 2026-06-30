<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    /** Barra lateral compartilhada (cacheada). */
    private function sidebar(): array
    {
        return Cache::remember('blog.sidebar', now()->addMinutes(10), function () {
            return [
                'categories' => Category::withCount(['posts' => fn ($q) => $q->published()])
                    ->orderBy('name')->get(),
                'populares'  => Post::published()->orderByDesc('views')->limit(5)->get(['id', 'title', 'slug']),
            ];
        });
    }

    public function index(Request $request)
    {
        $busca = $request->query('q');

        $posts = Post::published()
            ->with('category')
            ->search($busca)
            ->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString();

        $seo = [
            'title'       => 'Blog GovSocial — Comunicação pública, LGPD e mídias sociais',
            'description' => 'Conteúdo prático para gestores e comunicadores públicos: LGPD, publicidade institucional, operação de redes sociais e conformidade no setor público.',
            'canonical'   => route('blog.index'),
            'og_type'     => 'website',
            'image'       => asset('img/seminarios/govsocial/img-evento-cheio.jpg'),
            'breadcrumbs' => [
                ['name' => 'Início', 'url' => url('/')],
                ['name' => 'Blog', 'url' => route('blog.index')],
            ],
        ];

        return view('blog.index', array_merge($this->sidebar(), [
            'posts' => $posts,
            'busca' => $busca,
            'seo'   => $seo,
            'tituloPagina' => 'Blog GovSocial',
            'subtitulo'    => 'Comunicação pública, LGPD e mídias sociais — sem juridiquês.',
        ]));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->published()->with('category')
            ->orderByDesc('published_at')->paginate(9)->withQueryString();

        $seo = [
            'title'       => ($category->name).' — Blog GovSocial',
            'description' => $category->description ?: "Artigos sobre {$category->name} para comunicadores e gestores do setor público.",
            'canonical'   => route('blog.category', $category),
            'og_type'     => 'website',
            'image'       => asset('img/seminarios/govsocial/img-evento-cheio.jpg'),
            'breadcrumbs' => [
                ['name' => 'Início', 'url' => url('/')],
                ['name' => 'Blog', 'url' => route('blog.index')],
                ['name' => $category->name, 'url' => route('blog.category', $category)],
            ],
        ];

        return view('blog.index', array_merge($this->sidebar(), [
            'posts' => $posts,
            'busca' => null,
            'seo'   => $seo,
            'tituloPagina' => $category->name,
            'subtitulo'    => $category->description,
        ]));
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->published()->with('category')
            ->orderByDesc('published_at')->paginate(9)->withQueryString();

        $seo = [
            'title'       => 'Tag: '.$tag->name.' — Blog GovSocial',
            'description' => "Artigos marcados com {$tag->name} no Blog GovSocial.",
            'canonical'   => route('blog.tag', $tag),
            'og_type'     => 'website',
            'image'       => asset('img/seminarios/govsocial/img-evento-cheio.jpg'),
            'breadcrumbs' => [
                ['name' => 'Início', 'url' => url('/')],
                ['name' => 'Blog', 'url' => route('blog.index')],
                ['name' => '#'.$tag->name, 'url' => route('blog.tag', $tag)],
            ],
        ];

        return view('blog.index', array_merge($this->sidebar(), [
            'posts' => $posts,
            'busca' => null,
            'seo'   => $seo,
            'tituloPagina' => '#'.$tag->name,
            'subtitulo'    => null,
        ]));
    }

    public function show(Post $post)
    {
        abort_unless($post->isPublished(), 404);

        $post->load('category', 'tags');
        $post->incrementViews();

        $relacionados = Post::published()
            ->where('id', '!=', $post->id)
            ->when($post->category_id, fn ($q) => $q->where('category_id', $post->category_id))
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        $breadcrumbs = [
            ['name' => 'Início', 'url' => url('/')],
            ['name' => 'Blog', 'url' => route('blog.index')],
        ];
        if ($post->category) {
            $breadcrumbs[] = ['name' => $post->category->name, 'url' => route('blog.category', $post->category)];
        }
        $breadcrumbs[] = ['name' => $post->title, 'url' => route('blog.show', $post)];

        $seo = [
            'title'       => $post->meta_title ?: $post->title,
            'description' => $post->meta_description,
            'canonical'   => route('blog.show', $post),
            'og_type'     => 'article',
            'image'       => $post->featuredImageUrl() ?: asset('img/seminarios/govsocial/img-evento-cheio.jpg'),
            'breadcrumbs' => $breadcrumbs,
            'jsonld'      => [
                Seo::articleJsonLd($post),
                Seo::breadcrumbJsonLd($breadcrumbs),
            ],
            'published_time' => optional($post->published_at)->toAtomString(),
            'modified_time'  => optional($post->updated_at)->toAtomString(),
        ];

        return view('blog.show', [
            'post' => $post,
            'relacionados' => $relacionados,
            'seo' => $seo,
        ]);
    }
}
