<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->segment(3);

        $rules = [
            "name" => "required|string|min:3",
            "email" => "required|email|min:3|unique:users,email,{$id},id",
            "password" => "required|min:4|max:10",
        ];

        if ($this->isMethod('PUT')) {
            $rules['password'] = 'max:10';
        }

        return $rules;
    }
}
