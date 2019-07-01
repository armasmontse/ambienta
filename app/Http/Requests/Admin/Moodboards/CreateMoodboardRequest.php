<?php

namespace App\Http\Requests\Admin\Moodboards;

use App\Http\Requests\Request;

class CreateMoodboardRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user && $this->user->hasPermission('manage_moodboards') ) {
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
            'title'         => 'required|array',
            'content'       => 'required|url|pinterest_url',
            'description'   => 'required|array'
        ];

        foreach ($this->languages_isos as $lang_iso) {
            $rules['title.'.$lang_iso]      = 'required|string|max:255';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            //título
            'title.required'    =>  trans('manage_moodboards.create.title.required'),
            'title.array'       =>  trans('manage_moodboards.create.title.array'),

            //content
            'content.required'    =>  trans('manage_moodboards.create.content.required'),
            'content.url'       =>  trans('manage_moodboards.create.content.url'),

            //descripción
            'description.required' => trans('manage_moodboards.create.title.required'),
            'description.array' => trans('manage_moodboards.create.title.array'),
        ];

        foreach ($this->languages_isos as $lang_iso) {
            //título
            $messages['title.'.$lang_iso.'.required' ]      = trans('manage_moodboards.create.title.'.$lang_iso.'.required');
            $messages['title.'.$lang_iso.'.string' ]        = trans('manage_moodboards.create.title.'.$lang_iso.'.string');
            $messages['title.'.$lang_iso.'.max' ]           = trans('manage_moodboards.create.title.'.$lang_iso.'.max');

        }

        return $messages;
    }
}
