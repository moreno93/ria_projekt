<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminUserEditRequest extends Request
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
            'name' => 'required|min:3|max:255',
            'profession' => 'required',
            'interests' => 'max:250',
            'about' => 'max:500',
            'portfolio' => 'max:250',
            'diploma_certificate' => 'max:250',
        ];
    }
}
