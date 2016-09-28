<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ImageRequest extends Request
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
            'imageFile' => 'required|image'
        ];
    }
    public function messages(){
        return [
            'imageFile.required' => 'You need to choose an image file',
            'imageFile.image' => 'The file\'s format is incorrect (recommend: jpeg, bmp, png...)'
        ];
    }
}
