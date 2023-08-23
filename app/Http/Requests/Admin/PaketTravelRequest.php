<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaketTravelRequest extends FormRequest
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
            'judul'=>'required|max:255',
            'lokasi'=>'required|max:255',
            'tentang'=>'required',
            'event'=>'required|max:255',
            'bahasa'=>'required|max:255',
            'makanan'=>'required|max:255',
            'tgl_berangkat'=>'required|date',
            'durasi'=>'required|max:255',
            'tipe'=>'required|max:255',
            'harga'=>'required|integer',
        ];
    }
}
