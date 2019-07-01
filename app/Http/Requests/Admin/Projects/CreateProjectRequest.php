<?php

namespace App\Http\Requests\Admin\Projects;

use App\Http\Requests\Request;

class CreateProjectRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user && $this->user->hasPermission('manage_projects') ) {
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
			'subtitle'    	=> 'required|array',
    		'content'   	=> 'required|array',
        ];

        foreach ($this->languages_isos as $lang_iso) {
            $rules['title.'.$lang_iso]      	= 'required|string|max:255';
			$rules['subtitle.'.$lang_iso]      	= 'required|string|max:255';
            $rules['content.'.$lang_iso]       = 'required|string';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            //título
            'title.required'    =>  trans('manage_projects.create.title.required'),
            'title.array'       =>  trans('manage_projects.create.title.array'),

			'subtitle.required'    =>  trans('manage_projects.create.subtitle.required'),
            'subtitle.array'       =>  trans('manage_projects.create.subtitle.array'),
            //descripción
            'content.required'    =>  trans('manage_projects.create.content.required'),
            'content.array'       =>  trans('manage_projects.create.content.array'),
        ];

        foreach ($this->languages_isos as $lang_iso) {
            //título
            $messages['title.'.$lang_iso.'.required' ]      = trans('manage_projects.create.title.'.$lang_iso.'.required');
            $messages['title.'.$lang_iso.'.string' ]           = trans('manage_projects.create.title.'.$lang_iso.'.string');
			$messages['title.'.$lang_iso.'.max' ]           = trans('manage_projects.create.title.'.$lang_iso.'.max');

			//subtítulo
            $messages['subtitle.'.$lang_iso.'.required' ]      = trans('manage_projects.create.subtitle.'.$lang_iso.'.required');
            $messages['subtitle.'.$lang_iso.'.string' ]           = trans('manage_projects.create.subtitle.'.$lang_iso.'.string');
			$messages['subtitle.'.$lang_iso.'.max' ]           = trans('manage_projects.create.subtitle.'.$lang_iso.'.max');

            //descripción
            $messages['content.'.$lang_iso.'.required' ]      = trans('manage_projects.create.content.'.$lang_iso.'.required');
            $messages['content.'.$lang_iso.'.string' ]          = trans('manage_projects.create.content.'.$lang_iso.'.string');
        }

        return $messages;
    }
}
