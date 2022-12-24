<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the review is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:10'],
            'score' => ['required'],
            'comment' => ['required', 'max:200'],
            'reply' => ['max:200'],
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'ニックネーム',
            'score' => '評価',
            'comment' => 'コメント',
            'reply' => '返信',
        ];
    }

    /**
     * バリデーションメッセージ
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => ':attributeの入力は必須です。',
            'name.max' => ':attributeは10字以内で入力して下さい。',
            'score.required' => ':attributeを一つ選んで下さい。',
            'comment.required' => ':attributeの入力は必須です。',
            'comment.max' => ':attributeは200字以内で入力して下さい。',
            'reply.max' => ':attributeは200字以内で入力して下さい。',
        ];
    }
}
