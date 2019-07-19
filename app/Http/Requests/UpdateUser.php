<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateUser extends FormRequest
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
            'name' => 'required|min:2',
            'mail' => 'unique:connection.users,email_address'.$this->user,
            'password' => 'required|min:8|max:20',
            'address' => 'required|min:4',
            'birthday' => 'date|before:today',
            'role_id' => 'required',
            'is_active' => 'required'


        ];
    }
}
