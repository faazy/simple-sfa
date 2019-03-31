<?php

namespace App\Http\Requests;

use Common\Base\BaseFormRequest;

class CategoryRequest extends BaseFormRequest
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
        $catId = $this->route('category');

        return [
            'code' => 'required|unique:categories,code,' . $catId,
            'name' => 'required|min:3',
        ];

    }


}
