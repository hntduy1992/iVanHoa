<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuyetDinhUpdateRequest extends FormRequest
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
            'soHieu' => 'required|unique:ql_quyet-dinh,soHieu'.$this->soHieu,
            'nam' => 'required|unique:ql_quyet-dinh,nam'.$this->nam,
        ];
    }

    public function messages(): array
    {
        return [
            'soHieu.required' => 'Số hiệu văn bản không được trống',
            'soHieu.unique' => 'Số hiệu văn bản đã tồn tại',
            'nam.required' => 'Năm văn bản không được trống',
            'nam.unique' => 'Năm văn bản đã tồn tại',
        ];
    }
}
