<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
    {
        return [
            'title' => 'required|min:4|max:255',
            'slug' => 'sometimes|min:4|max:50',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'cover_img' => 'sometimes|min:10|max:255',
            'tags.*' => 'numeric|exists:tags,id'
            //
        ];
    }
}
