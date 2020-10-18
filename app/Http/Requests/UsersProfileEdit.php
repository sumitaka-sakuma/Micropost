<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Micropost;
use Illuminate\Foundation\Http\FormRequest;

class UsersProfileEdit extends FormRequest
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
            'name'              => 'required|string|max:30',
            'birthday[0]'       => 'date_format:YYYY',
            'birthday[1]'       => 'date_format:mm',
            'birthday[2]'       => 'date_format:dd',
            'self_introduction' => 'max:300',
            'profile_image'     => 'image|mimes:jpeg,jpg,png'
        ];
    }
}
