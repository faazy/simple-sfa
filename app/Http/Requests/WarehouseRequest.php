<?php

namespace App\Http\Requests;

use Common\Base\BaseFormRequest;

class WarehouseRequest extends BaseFormRequest
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
        $whId = $this->route('warehouse');

        return [
            'code' => 'required|unique:warehouse,code,' . $whId,
            'name' => 'required',
            'address' => 'required',
        ];

    }


}
