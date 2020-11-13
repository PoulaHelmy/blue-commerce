<?php

namespace App\Http\Requests\BackEnd\Categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', Rule::unique('categories', 'name')->ignore($this->id)],
            'slug' => ['required', 'string', Rule::unique('categories', 'slug')->ignore($this->id)],
        ];
    }

}
