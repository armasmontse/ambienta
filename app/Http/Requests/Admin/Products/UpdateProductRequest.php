<?php

namespace App\Http\Requests\Admin\Products;

use App\Http\Requests\Request;

class UpdateProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user && $this->user->hasPermission('manage_products') ) {
            return true;
        }
        return false;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
			'publish_id'    => 'required|exists:publishes,id',
			'publish_at'    => 'required|date|date_format:Y-m-d',
            'title'       	=> 'required|array',
    		'description'   => 'required|array',
        ];

        foreach ($this->languages_isos as $lang_iso) {
            $rules['title.'.$lang_iso]      	= 'required|string|max:255';
            $rules['description.'.$lang_iso]    = 'required|string';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            //título
            'title.required'    =>  trans('manage_products.create.title.required'),
            'title.array'       =>  trans('manage_products.create.title.array'),
            'title.max'       =>  trans('manage_products.create.title.max'),

            //descripción
            'description.required'    =>  trans('manage_products.create.description.required'),
            'description.array'       =>  trans('manage_products.create.description.array'),
            'description.max'       =>  trans('manage_products.create.description.max'),
        ];

        foreach ($this->languages_isos as $lang_iso) {
            //título
            $messages['title.'.$lang_iso.'.required' ]      = trans('manage_products.create.title.'.$lang_iso.'.required');
            $messages['title.'.$lang_iso.'.max' ]           = trans('manage_products.create.title.'.$lang_iso.'.max');

            //descripción
            $messages['description.'.$lang_iso.'.required' ]      = trans('manage_products.create.description.'.$lang_iso.'.required');
            $messages['description.'.$lang_iso.'.max' ]          = trans('manage_products.create.description.'.$lang_iso.'.max');
        }

        return $messages;
    }
}
