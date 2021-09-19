<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpendingRequest extends FormRequest
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
            'spending' => 'required|max:255',
            'category' => 'required',
            'amount' => 'required|int|min:1',
            'date' => 'required|before:tomorrow'
        ];
    }

    public function attributes()
    {
        return [
            'spending' => '支出名',
            'category' => 'カテゴリ',
            'amount' => '金額',
            'date' => '日付'
        ];
    }
}
