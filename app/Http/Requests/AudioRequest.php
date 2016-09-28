<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Factory;
class AudioRequest extends Request
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
            'audioFile' => 'required|audio'
        ];
    }
    public function messages(){
        return [
            'audioFile.required' => 'You need to choose an audio file',
            'audioFile.audio' => 'The audio file\'s format is incorrect (recommend: mp3, wav)' 
        ];
    }
}
