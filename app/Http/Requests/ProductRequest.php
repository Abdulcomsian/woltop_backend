<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isDelete = $this->isMethod('delete');
        $isUpdate = $this->isMethod('patch');
        if ($isDelete) {
            return [
                'product_id' => 'required|exists:products,id',
            ];
        } elseif($isUpdate) {
            return [
                'product_id' => 'required|exists:products,id',
                'name' => 'required|string|max:255',
            ];
        }
        return [
            'name' => 'required|string|max:255',
        ];
    }
}