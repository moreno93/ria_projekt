<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AuditionRequest extends Request
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
            'audition_name' => 'required|min:3',
            'description' => 'required',
            'country' => 'required',
            'city' => 'required',
            'budget' => 'required|integer',
            'num_directors' => 'integer',
            'num_producers' => 'integer',
            'num_cameraman' => 'integer',
            'num_film_editors' => 'integer',
            'num_sound_designers' => 'integer',
            'num_actors' => 'integer',
            'num_extras' => 'integer',
            'pay_directors' => 'integer',
            'pay_producers' => 'integer',
            'pay_cameraman' => 'integer',
            'pay_film_editors' => 'integer',
            'pay_sound_designers' => 'integer',
            'pay_actors' => 'integer',
            'pay_extras' => 'integer',
        ];
    }
}
