<?php

namespace App\Modules\CreditRequest\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        return Gate::allows('editUser', $this->user);
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            'document_type' => 'required',
            'document' => ['required', Rule::unique('users')->ignore($this->user)],
        ];
    }

    public function UpdateUser($user)
    {
        $user->fill([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'document_type' => $this->document_type,
            'document' => $this->document,
        ]);
        $user->save();

        return $user;
    }
}
