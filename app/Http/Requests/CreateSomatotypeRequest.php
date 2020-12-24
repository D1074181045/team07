<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSomatotypeRequest extends FormRequest
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
            'somatotype' => 'required|string|min:1|max:50',
            'avg_height' => 'required|numeric|min:1|max:200',
            'avg_weight' => 'required|numeric|min:1|max:150|lt:avg_height'
        ];
    }

    public function messages()
    {
        return [
            'somatotype.required' => '體型必須為必填',
            'somatotype.min' => '體型必須為 1~50 字元之間',
            'somatotype.max' => '體型必須為 1~50 字元之間',
            'avg_height.required' => '平均身高必須為必填',
            'avg_weight.required' => '平均體重必須為必填',
            'avg_height.min' => '平均身高必須為 1~200 之間',
            'avg_height.max' => '平均身高必須為 1~200 之間',
            'avg_weight.min' => '平均體重必須為 1~150 之間',
            'avg_weight.max' => '平均體重必須為 1~150 之間',
            'avg_weight.lt' => '身高必須大於體重'
        ];
    }
}
