<?php

namespace absensi_javan\Http\Requests;

use absensi_javan\Http\Requests\Request;

class Tanggal extends Request
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
          'cari' => 'required|date|date_format:d-m-Y'  
        ];
    }
}
