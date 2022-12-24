<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PointRequest extends FormRequest
{
    /**
     * Determine if the point is authorized to make this request.
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
            'name' => ['required', 'max:30', Rule::unique('points')->ignore($this->id)],
            'detailA' => ['required','max:100'],
            'detailB' => ['max:100'],
            'detailC' => ['max:100'],
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '特長名',
            'detailA' => 'ポイント１',
            'detailB' => 'ポイント２',
            'detailC' => 'ポイント３',
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
            'name.max' => ':attributeは30字以内で入力して下さい。',
            'name.unique' => 'その:attributeはすでに登録済みです。',
            'detailA.required' => ':attributeは入力必須です。',
            'detailA.max' => ':attributeは100字以内で入力して下さい。',
            'detailB.max' => ':attributeは100字以内で入力して下さい。',
            'detailC.max' => ':attributeは100字以内で入力して下さい。',
        ];
    }
}
