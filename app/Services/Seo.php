<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Str;

/**
 * Monta os dados estruturados (Schema.org / JSON-LD) do blog.
 */
class Seo
{
    public const SITE_NAME = 'Unyflex · Blog GovSocial';
    public const PUBLISHER = 'Unyflex Digital';
    public const LOGO = 'img/logo-unyflex-white.png';

    public static function articleJsonLd(Post $post): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type'    => 'Article',
            'headline' => Str::limit(strip_tags($post->title), 110, ''),
            'description' => (string) $post->meta_description,
            'image'    => $post->featuredImageUrl() ? [$post->featuredImageUrl()] : [],
            'datePublished' => optional($post->published_at)->toAtomString(),
            'dateModified'  => optional($post->updated_at)->toAtomString(),
            'author' => [
                '@type' => 'Organization',
                'name'  => $post->author ?: self::PUBLISHER,
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name'  => self::PUBLISHER,
                'logo'  => [
                    '@type' => 'ImageObject',
                    'url'   => asset(self::LOGO),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id'   => route('blog.show', $post),
            ],
            'keywords' => $post->tags->pluck('name')->implode(', '),
            'articleSection' => optional($post->category)->name,
        ];
    }

    public static function breadcrumbJsonLd(array $items): array
    {
        $elements = [];
        foreach ($items as $i => $item) {
            $elements[] = [
                '@type'    => 'ListItem',
                'position' => $i + 1,
                'name'     => $item['name'],
                'item'     => $item['url'],
            ];
        }
        return [
            '@context' => 'https://schema.org',
            '@type'    => 'BreadcrumbList',
            'itemListElement' => $elements,
        ];
    }
}
