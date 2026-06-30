<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null; // protegido pelo middleware auth
    }

    public function rules(): array
    {
        $postId = optional($this->route('post'))->id;

        return [
            'title'            => ['required', 'string', 'max:180'],
            'slug'             => ['nullable', 'string', 'max:200', Rule::unique('posts', 'slug')->ignore($postId)],
            'excerpt'          => ['nullable', 'string', 'max:300'],
            'content'          => ['required', 'string'],
            'category_id'      => ['nullable', 'integer', 'exists:categories,id'],
            'author'           => ['nullable', 'string', 'max:120'],
            'status'           => ['required', Rule::in(['draft', 'published'])],
            'published_at'     => ['nullable', 'date'],
            'meta_title'       => ['nullable', 'string', 'max:70'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'focus_keyword'    => ['nullable', 'string', 'max:120'],
            'tags'             => ['nullable', 'string', 'max:400'],
            'featured_image'   => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'título', 'content' => 'conteúdo', 'category_id' => 'categoria',
            'featured_image' => 'imagem de destaque',
        ];
    }
}
