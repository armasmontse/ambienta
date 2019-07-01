<?php

namespace App\Http\Requests\Admin\Press;

use App\Http\Requests\Request;
use App\Models\Press\Press;

class UpdatePressRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user && $this->user->hasPermission('manage_press') ) {
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
        $input = $this->all();

        $rules = [
            'publish_id'    => 'required|exists:publishes,id',
            'publish_at'    => 'required|date|date_format:Y-m-d',
            'content_pdf'       => 'file|mimes:pdf',
            'content_link'       => 'url',
            //'content'       => 'required',
            'title'       => 'required|max:400',
        ];

        //Si el tipo de contenido que existe en press es link
        //Y viene en el request el tipo PDF, lo hacemos requerido
        if($this->press->content_type == Press::LINK_TYPE && $input['content_type'] == Press::PDF_TYPE){
            $rules['content_pdf'] .= '|required';
        }

        if($input['content_type'] == 'Link'){
            $rules["content_link"] .= "|required";
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'content_pdf.required'    =>  trans('manage_press.create.content_pdf.required'),
            'content_pdf.mimes'    =>  trans('manage_press.create.content_pdf.mimes'),
            'content_pdf.file'    =>  trans('manage_press.create.content_pdf.file'),
            'content_link.required'       =>  trans('manage_press.create.content_link.required'),
            'content_link.url'       =>  trans('manage_press.create.content_link.url'),
            'title.required' => trans('manage_press.create.title.required'),
            'title.max' => trans('manage_press.create.title.max'),
            'publish_id.required' => trans('manage_press.create.publish_id.required'),
            'publish_id.exists' => trans('manage_press.create.publish_id.exists'),
            'publish_at.required' => trans('manage_press.create.publish_at.required'),
            'publish_at.date' => trans('manage_press.create.publish_at.date'),
            'publish_at.date_format' => trans('manage_press.create.publish_at.date'),
        ];
    }
}
