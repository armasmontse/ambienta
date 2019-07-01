<?php

namespace App\Http\Requests\Client;

use App\Http\Requests\Request;

class CreateContactRequest extends Request
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
            "full_name"	=> "required|string",

			"age"		=> "present|integer|min:1",
			"sex"		=> "in:hombre,mujer",

            "phone"     => "required|string",
            "email"     => "required|email",

			"event"   	=> "required|string",

			"date" 				=> "required|date|date_format:Y-m-d|after:today",
			"number_invites" 	=> "in:".implode(",", getInvitedNumberOptions()),
			"type" 				=> "required|string",

        ];
    }

    public function messages()
    {
        return [
            'full_name.required' 	=> trans('contact_form.full_name.required'),
            'full_name.string' 		=> trans('contact_form.full_name.string'),

            'age.present' 			=> trans('contact_form.age.present'),
			'age.integer' 			=> trans('contact_form.age.integer'),
            'age.min' 	  			=> trans('contact_form.age.min'),

			'sex.in' 				=> trans('contact_form.sex.in'),

			'phone.required' 		=> trans('contact_form.phone.required'),
			'phone.string' 			=> trans('contact_form.phone.string'),

            'email.required' 		=> trans('contact_form.email.required'),
            'email.email' 			=> trans('contact_form.email.email'),

			'event.required' 		=> trans('contact_form.event.required'),
			'event.string' 			=> trans('contact_form.event.string'),

			'date.after' 			=> trans('contact_form.date.after'),

        ];
    }
}
