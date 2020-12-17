<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVarietieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            //
            'name' => 'required|string|min:1|max:50',
            'somatotype_id' => 'required',
            'source' => 'required',
            'avg_life' => 'required|numeric|min:1|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '狗狗名稱必須為必填',
            'avg_life.required' => '平均壽命必須為必填',
            'source.required' => '原產地必須為必填',
            'somatotype_id.required' => '體型必須為必填',
            'name.min' => '狗狗名稱必須為 1~50 字元之間',
            'name.max' => '狗狗名稱必須為 1~50 字元之間',
            'avg_life.min' => '平均壽命必須為 1~100 之間',
            'avg_life.max' => '平均壽命必須為 1~100 之間'
        ];
    }
}
