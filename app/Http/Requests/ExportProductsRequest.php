<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExportProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'uuid' => ['required', 'string'],
        ];
    }

    public function getUId(): string
    {
        return $this->str('uuid');
    }
}
