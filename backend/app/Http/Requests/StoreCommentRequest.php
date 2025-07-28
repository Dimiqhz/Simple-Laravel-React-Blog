<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Валидация запроса добавления комментария
 */
class StoreCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'author_name' => 'required|string|max:100',
            'body'    => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
