<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $companytId = $this->route('supplier');

        return [
            'name' => 'required',
            'company' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:companies,email,' . $companytId,
        ];
    }
}
