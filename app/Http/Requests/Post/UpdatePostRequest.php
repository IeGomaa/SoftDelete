<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:posts,id',
            'title' => 'required|string|regex:/^[a-zA-Z]*$/u|unique:posts,title,' . request('id'),
            'author' => 'required|string|max:255',
            'body' => 'required|string|max:20',
            'image' => 'image|mimes:png,jpg,webp|max:2000',
            'date' => 'required|date'
        ];
    }
}
