<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($request->firstname) {

            return [
                'firstname' =>
                    'required|min:3|max:40'
                ,
            ];
        }
        elseif($request->lastname){
            return [
                'lastname' =>
                    'required|min:3|max:40'
                ,
            ];
        }
        elseif($request->email){
            return [
                'email' =>
                    'required|email|unique:users'
                ,
            ];
        }
        elseif($request->mobile){
            return [
                'mobile' =>
                    'required|unique:users|digits_between:5,15|numeric'
                ,
            ];
        }
        elseif($request->country){
            return [
                'country' =>
                    'required|min:3|max:40'
                ,
            ];
        }
        elseif($request->city){
            return [
                'city' =>
                    'required|min:3|max:40'
                ,
            ];
        }
    }
}
