<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('access-dashboard') ?? false;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'category' => ['required', 'string', 'max:100'],
            'client' => ['nullable', 'string', 'max:120'],
            'delivery' => ['nullable', 'string', 'max:1000'],
            'description' => ['required', 'string', 'max:5000'],
            'link' => ['nullable', 'url:http,https', 'max:2048'],
            'technologies' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'sort_order' => ['required', 'integer', 'min:0', 'max:9999'],
            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_images' => ['nullable', 'array'],
            'remove_images.*' => ['string'],
            'video' => ['nullable', 'file', 'mimes:mp4,webm,mov', 'max:51200'],
            'remove_video' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'images.max' => 'Envie no máximo 10 imagens por vez.',
            'images.*.max' => 'Cada imagem pode ter no máximo 5 MB.',
            'video.max' => 'O vídeo pode ter no máximo 50 MB.',
        ];
    }
}
