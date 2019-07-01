<?php

namespace App\Http\Requests\Admin\Collections;

use App\Http\Requests\Request;

class CreateCollectionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user && $this->user->hasPermission('manage_collections') ) {
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

            'title'       => 'required|array|max:255',
            'subtitle'    => 'array|max:255',
            'excerpt'     => 'required|array|max:255',
    		'content'     => 'required|array|max:255',
            'highlighted' => 'only_one_default:collections'
        ];

        foreach ($this->languages_isos as $lang_iso) {
            $rules['title.'.$lang_iso]      = 'required|string|max:255';
            $rules['subtitle.'.$lang_iso]   = 'string|max:255';
            $rules['excerpt.'.$lang_iso]    = 'required|string';
            $rules['content.'.$lang_iso]    = 'required|string';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            //título
            'title.required'    =>  trans('manage_collections.create.title.required'),
            'title.array'       =>  trans('manage_collections.create.title.array'),
            'title.max'       =>  trans('manage_collections.create.title.max'),

            //subtítulo
            'subtitle.required'    =>  trans('manage_collections.create.subtitle.required'),
            'subtitle.array'       =>  trans('manage_collections.create.subtitle.array'),
            'subtitle.max'       =>  trans('manage_collections.create.subtitle.max'),

            //resumen
            'excerpt.required'    =>  trans('manage_collections.create.excerpt.required'),
            'excerpt.array'       =>  trans('manage_collections.create.excerpt.array'),
            'excerpt.max'       =>  trans('manage_collections.create.excerpt.max'),

            //descripción
            'content.required'    =>  trans('manage_collections.create.content.required'),
            'content.array'       =>  trans('manage_collections.create.content.array'),
            'content.max'       =>  trans('manage_collections.create.content.max'),
        ];

        foreach ($this->languages_isos as $lang_iso) {
            //título
            $messages['title.'.$lang_iso.'.required' ]      = trans('manage_collections.create.title.'.$lang_iso.'.required');
            $messages['title.'.$lang_iso.'.max' ]           = trans('manage_collections.create.title.'.$lang_iso.'.max');

            //subtítulo
            $messages['subtitle.'.$lang_iso.'.required' ]      = trans('manage_collections.create.subtitle.'.$lang_iso.'.required');
            $messages['subtitle.'.$lang_iso.'.max' ]            = trans('manage_collections.create.subtitle.'.$lang_iso.'.max');

            //resumen
            $messages['excerpt.'.$lang_iso.'.required' ]      = trans('manage_collections.create.excerpt.'.$lang_iso.'.required');
            $messages['excerpt.'.$lang_iso.'.max' ]          = trans('manage_collections.create.excerpt.'.$lang_iso.'.max');

            //descripción
            $messages['content.'.$lang_iso.'.required' ]      = trans('manage_collections.create.content.'.$lang_iso.'.required');
            $messages['content.'.$lang_iso.'.max' ]          = trans('manage_collections.create.content.'.$lang_iso.'.max');
        }

        return $messages;
    }
}
