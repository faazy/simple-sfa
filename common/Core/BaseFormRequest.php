<?php namespace Common\Base;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseFormRequest extends FormRequest
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
     * {@inheritdoc}
     */
    protected function formatErrors(Validator $validator)
    {
        return $this->formatValidationErrors($validator);
    }

    /**
     * Format the validation errors to be returned.
     *
     * @param Validator $validator
     * @return array
     */
    public static function formatValidationErrors(Validator $validator)
    {
        $formatted = $validator->errors()->getMessages();

        return ['status' => 'error', 'messages' => $formatted];
    }
}
