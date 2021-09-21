<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncomeRequest extends FormRequest
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
            'income_source_id' => 'required',
            'amount' => 'required|int|min:1',
            'date' => 'required|before:tomorrow'
        ];
    }

    public function attributes()
    {
        return [
            'income_source_id' => '収入源',
            'amount' => '金額',
            'date' => '日付'
        ];
    }
}
