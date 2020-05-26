<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post.title' => 'required|max:20',
            'post.tag_id' => 'required|exists:tags,id',
            'post.text_content' => 'required|max:400',
            'comment.text' => 'required|max:100',
        ];
    }
}
