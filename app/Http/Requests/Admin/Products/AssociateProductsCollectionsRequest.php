<?php

namespace App\Http\Requests\Admin\Products;

use App\Http\Requests\Request;

class AssociateProductsCollectionsRequest extends Request
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
            'collections'         => 'array',
			'collections.*'       => 'exists:collections,id',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
