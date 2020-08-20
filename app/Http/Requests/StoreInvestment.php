<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvestment extends FormRequest
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
            'group' => 'required|max:255',
            'name' => 'required|max:255',
            'code' => 'required|numeric',
            'dist_short' => 'required|max:255',
            'dist' => 'required|max:255',
            'code_owu' => 'required|max:255',
            'code_toil' => 'required|max:255',
            'edit_date' => 'required|date',
            'type' => 'required|max:255',
            'status' => 'required|max:1',
        ];
    }
}