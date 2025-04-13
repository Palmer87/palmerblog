<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Contracts\Service\Attribute\Required;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    { return [
        "title" => "required|min:3|max:255",
        "slug" => ["required","min:3"],
        "content" => "required|min:10",
        "category_id" => ['required', 'exists:categories,id'],
        "tags" => ['nullable', 'array'], // Permet d'envoyer plusieurs tags
        "tags.*" => ['exists:tags,id'],
        "image" => ['image', 'max:2048'], // Vérifie que l'image est valide
         // Vérifie que chaque tag existe
    ];
    }
}
