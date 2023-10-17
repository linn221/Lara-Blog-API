<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'slug' => 'required|unique:posts,slug,' . $this->post->id .'|min:4|max:50',
            'content' => 'required',
            'cover_img' => 'required|min:10|max:255',
            'category_id' => 'required|exists:categories,id'
            //
        ];
    }
}
