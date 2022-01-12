<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateKosRequest extends FormRequest
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
            'nama_kos' => 'required|max:50|min:3',
            'deskripsi_kos' => 'required',
            'type_kos' => 'required',
            'aturan_kos' => 'required',
            'biaya_booking' => 'max:17',
            'latitude' => 'required',
            'longitude' => 'required'
        ];
    }
}
