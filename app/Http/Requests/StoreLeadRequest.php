<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome'     => ['required', 'string', 'max:120'],
            'email'    => ['required', 'email', 'max:160'],
            'telefone' => ['nullable', 'string', 'max:40'],
            'orgao'    => ['nullable', 'string', 'max:160'],
            'cargo'    => ['nullable', 'string', 'max:120'],
            'mensagem' => ['nullable', 'string', 'max:1000'],
            // honeypot anti-spam (deve vir vazio)
            'website'  => ['nullable', 'size:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'  => 'Informe seu nome.',
            'email.required' => 'Informe seu e-mail.',
            'email.email'    => 'Informe um e-mail válido.',
            'website.size'   => 'Falha na validação.',
        ];
    }
}
