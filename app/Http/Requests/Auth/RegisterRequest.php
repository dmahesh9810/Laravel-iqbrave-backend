<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstname' =>
                'required|min:3|max:40'
            ,
            'lastname' =>
                'required|min:3|max:40'
            ,
            'email' =>
                'required|email|unique:users'
            ,
            'mobile' =>
                'required|unique:users|digits_between:5,15|numeric'
            ,
            'country' =>
                'required|min:3|max:40'
            ,
            'city' =>
                'required|min:3|max:40'
            ,
            'password' =>
                'required|min:6|max:16|same:confirmpassword'
            ,
            // 'confirmpassword' =>
            //     'required|same:password|min:6|max:16'
            // ,

        ];
    }
}
