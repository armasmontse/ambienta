<?php

namespace App\Http\Requests\Admin\Collections\Types;

use App\Http\Requests\Request;

class CreateTypeRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user && $this->user->hasPermission('manage_types') ) {
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
            'label' => 'required|array',
        ];

        foreach ($this->languages_isos as $lang_iso) {
            $rules['label.' . $lang_iso] = 'required|max:255';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'label.required' =>  trans('manage_types.create.label.required'),
            'label.array' =>  trans('manage_types.create.label.array'),
        ];
    }
}
