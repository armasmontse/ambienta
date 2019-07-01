<?php

namespace App\Http\Requests\Admin\Collections;

use App\Http\Requests\Request;

class UpdateCollectionRequest extends Request
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

		$collection = $this->route()->parameters()["collection"];
        $rules = [
			'publish_id'    => 'required|exists:publishes,id',
			'publish_at'    => 'required|date|date_format:Y-m-d',

            'title'     	=> 'required|array',
            'subtitle'  	=> 'array',
            'excerpt'   	=> 'required|array',
    		'content'   	=> 'required|array',
			'highlighted'	=> 'only_one_default:collections,'.$collection->id,
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
            'title.required'    =>  trans('manage_collections.update.title.required'),
            'title.array'       =>  trans('manage_collections.update.title.array'),

            'subtitle.required'    =>  trans('manage_collections.update.subtitle.required'),
            'subtitle.array'       =>  trans('manage_collections.update.subtitle.array'),

            'excerpt.required'    =>  trans('manage_collections.update.excerpt.required'),
            'excerpt.array'       =>  trans('manage_collections.update.excerpt.array'),

            'content.required'    =>  trans('manage_collections.update.content.required'),
            'content.array'       =>  trans('manage_collections.update.content.array'),
        ];

		foreach ($this->languages_isos as $lang_iso) {
			$rules['title.'.$lang_iso.'required' ]      = trans('manage_collections.update.title.'.$lang_iso.'.required');
			$rules['title.'.$lang_iso.'string' ]      	= trans('manage_collections.update.title.'.$lang_iso.'.string');
			$rules['title.'.$lang_iso.'max' ]      		= trans('manage_collections.update.title.'.$lang_iso.'.max');

			$rules['subtitle.'.$lang_iso.'required' ]      = trans('manage_collections.update.subtitle.'.$lang_iso.'.required');
			$rules['subtitle.'.$lang_iso.'string' ]      	= trans('manage_collections.update.subtitle.'.$lang_iso.'.string');
			$rules['subtitle.'.$lang_iso.'max' ]      		= trans('manage_collections.update.subtitle.'.$lang_iso.'.max');

			$rules['excerpt.'.$lang_iso.'required' ]      = trans('manage_collections.update.excerpt.'.$lang_iso.'.required');
			$rules['excerpt.'.$lang_iso.'string' ]      	= trans('manage_collections.update.excerpt.'.$lang_iso.'.string');

			$rules['content.'.$lang_iso.'required' ]      = trans('manage_collections.update.content.'.$lang_iso.'.required');
			$rules['content.'.$lang_iso.'string' ]      	= trans('manage_collections.update.content.'.$lang_iso.'.string');
		}


        return $messages;
    }
}
