<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'name'=>'required',
            'mail'=>'required',
            'flexRadioDefault'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'pass'=>'required | min: 4',
            'cpass'=> 'required'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => '**name cannot be empty !',
            'mail.required' => '**mail cannot be empty !',
            'flexRadioDefault.required' => '**gender cannot be empty !',
            'address.required' => '**address cannot be empty !',
            'phone.required' => '**phone cannot be empty !',
            'pass.required' => '**password cannot be empty !',
            'cpass.required' => '**confirm pass cannot be empty !'

        ];
    }
}
