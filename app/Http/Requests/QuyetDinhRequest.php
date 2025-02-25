<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuyetDinhRequest extends FormRequest
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
        return [
            'soHieu' => 'required',
            'nam' => 'required|unique:ql_quyet-dinh,nam',
        ];
    }

    public function messages(): array
    {
        return [
            'soHieu.required' => 'Số hiệu văn bản không được trống',
            'nam.required' => 'Năm văn bản không được trống',
            'nam.unique' => 'Năm văn bản đã tồn tại',
        ];
    }
}
