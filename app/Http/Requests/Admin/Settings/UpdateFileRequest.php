<?php

namespace App\Http\Requests\Admin\Settings;

use App\Http\Requests\Request;

class UpdateFileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user && $this->user->hasPermission('system_config') ) {
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
        return [
            'pdf' => 'required|file|mimes:pdf',
		];
    }
}
