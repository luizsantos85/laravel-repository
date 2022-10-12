<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategoryFormRequest extends FormRequest
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
        $id = $this->id();
        return [
            'title'         => "required|min:3|max:150|string|unique:categories",
            'url'           => "required|min:5|max:150|string",
            'description'   => "nullable|string|max:2000",
        ];
    }
}
