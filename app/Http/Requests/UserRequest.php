<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'name' => ['required', 'max:100', 
                        Rule::unique('users')->ignore($this->id)],
            'email' => ['required', 'max:255', 'email',
                        Rule::unique('users')->ignore($this->id)],
            'role' => ['in:0,1,2']
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '名前',
            'email' => 'メールアドレス',
            'role' => '権限'
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
            'name.max' => ':attributeは100字以内で入力して下さい。',
            'name.unique' => 'その:attributeはすでに登録済みです。',
            'email.unique' => 'その:attributeはすでに登録済みです。',
            'email.required' => ':attributeは入力必須です。',
            'email.max' => ':attributeは255字以内で入力して下さい。',
            'email.email' => ':attributeは正しく入力して下さい。',
            'email.unique' => 'その:attributeはすでに登録済みです。'
        ];
    }
}
