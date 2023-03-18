<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
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
            'post_id' => 'required|integer|exists:posts,id',
            'user_id' => 'required|integer|exists:users,id',
            'comment' => 'required|string',
            'date' => 'required|date'
        ];
    }
}
