<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Валидация запроса создания статьи
 */
class StoreArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
