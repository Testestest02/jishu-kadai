<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the item is authorized to make this request.
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
            'name' => ['required', 'max:40', Rule::unique('items')->ignore($this->id)], 
            'status' => ['required'],
            'type' => ['required', 'string', 'in:アウター,インナー'],
            'sex' => ['required', 'in:男女兼用,男性用,女性用'],
            'max' => ['required', 'in:おしっこ1回分,おしっこ2回分,おしっこ3回分,おしっこ4回分,おしっこ5回分'],
            'points' => ['required'],
            'sizes' => ['required']
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '商品名',
            'status' => '商品公開状況',
            'type' => '商品種別',
            'sex' => '対応性別',
            'max' => '吸水量',
            'points' => '特長',
            'sizes' => 'サイズ'
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
            'name.max' => ':attributeは40字以内で入力して下さい。',
            'name.unique' => 'その:attributeはすでに登録済みです。',
            'status.required' => ':attributeはどちらか選択してください。',
            'type.required' => ':attributeを一つ選択してください。',
            'sex.required' => ':attributeを一つ選択してください。',
            'max.required' => ':attributeを一つ選択してください。',
            'points.required' => ':attributeは一つ以上選択してください。',
            'sizes.required' => ':attributeは一つ以上選択してください。'
        ];
    }
}
