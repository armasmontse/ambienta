<?php

namespace App\Http\Requests\Admin\Products;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class AssociateProductsRequest extends Request
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
		$product = $this->route()->parameters()['product'];

        return [
            'products'         => 'array',
			'products.*'       => Rule::exists('products','id')
			                ->where(function ($query) use ($product) {
			                    return $query->where('id' , "!=" , $product->id);
			                }),
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
