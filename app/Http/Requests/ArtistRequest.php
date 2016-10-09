<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArtistRequest extends Request
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
            //'name' => 'unique:artists,name'
        ];
    }
    public function messages(){
        return[
            //'name.unique' => 'Artist has existed'
        ];
    }
}
