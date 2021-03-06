<?php

namespace App\Http\Requests\Admin\Users;

use App\Http\Requests\Request;
use App\Models\Users\User;
use App\Models\Users\Role;

class UpdateUserRequest extends Request
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
        $input = $this->all();

        $user_editable = $this->route()->parameters()["user_editable"];

        $rules = [
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|max:255',
            'roles'         => 'required',
            'roles.*'       => 'required|exists:roles,id'
        ];



        if (!$this->user->isSuperAdmin()) {
            $roleSAdmin = Role::GetSuperAdmin();
            $rules['roles.*'] .= '|not_in:'.$roleSAdmin->id;
        }


        if( $user_editable && isset( $input['email']) && $user_editable->email != $input['email']  ){
            $rules['email'] .= "|unique:users";
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'first_name.required' => trans('users.first_name.update.required'),
            'first_name.max' => trans('users.first_name.update.max'),

            'last_name.required' => trans('users.last_name.update.required'),
            'last_name.max' => trans('users.last_name.update.max'),

            'email.required' => trans('users.email.update.required'),
            'email.email' => trans('users.email.update.email'),
            'email.max' => trans('users.email.update.max'),
            'email.unique' => trans('users.email.update.unique'),

            'roles.required' => trans('users.roles.update.required'),
            'roles.*.required' => trans('users.roles.update.required'),
            'roles.*.exist' => trans('users.roles.update.exist'),
        ];
    }
}
