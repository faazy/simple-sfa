<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $proId = $this->route('product');
        //decimal validation
        $regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";

        return [
            'code' => 'required|unique:products,code,' . $proId,
            'name' => 'required',
            'category_id' => 'required',
            'cost' => 'required|regex:' . $regex,
            'price' => 'required|regex:' . $regex
        ];
    }
}
