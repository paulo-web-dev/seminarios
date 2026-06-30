<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        $id = optional($this->route('category'))->id;

        return [
            'name'        => ['required', 'string', 'max:120'],
            'slug'        => ['nullable', 'string', 'max:140', Rule::unique('categories', 'slug')->ignore($id)],
            'description' => ['nullable', 'string', 'max:500'],
        ];
    }
}
