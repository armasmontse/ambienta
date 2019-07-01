<?php

namespace App\Http\Requests\Admin\Users;

use App\Http\Requests\Request;
use App\Models\Users\User;
use App\Models\Users\Role;

class CreateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user && $this->user->hasPermission('manage_users') ) {
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'roles' => 'required',
            'roles.*' => 'required|exists:roles,id'
        ];

        if (!$this->user->isSuperAdmin()) {
            $roleSAdmin = Role::GetSuperAdmin();
            $rules['roles.*'] .= '|not_in:'.$roleSAdmin->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'first_name.required' => trans('manage_users.create.first_name.required'),
            'first_name.max' => trans('manage_users.create.first_name.max'),

            'last_name.required' => trans('manage_users.create.last_name.required'),
            'last_name.max' => trans('manage_users.create.last_name.max'),

            'email.required' => trans('manage_users.create.email.required'),
            'email.email' => trans('manage_users.create.email.email'),
            'email.max' => trans('manage_users.create.email.max'),
            'email.unique' => trans('manage_users.create.email.unique'),

            'roles.required' => trans('manage_users.create.roles.required'),
            'roles.*.required' => trans('manage_users.create.roles.required'),
            'roles.*.exist' => trans('manage_users.create.roles.exist'),
        ];
    }

}
