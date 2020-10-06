<?php

namespace App\Http\Requests;

use App\Models\User;
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

        $man   = "男";
        $woman = "女";
        $other = "その他";

        return [
            'name' => 'required|string|max:30',
            'self_introduction' => 'string|max:300'
        ];
    }
}
