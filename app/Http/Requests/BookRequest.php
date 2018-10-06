<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'=>'required|string|max:20',
            'description'=>'required|string|max:1000',
            'vpath'=>'sometimes|required|image',
            'category_id'=>'required|exists:categories,id',
            'price'=>'required|numeric'
        ];
    }

    public function attributes(){
        return [
            'title'=>'titulo',
            'description'=>'descripcion',
            'vpath'=>'imagen de portada',
            'category_id'=>'categoria',
            'price'=>'precio'
        ];
    }
}
