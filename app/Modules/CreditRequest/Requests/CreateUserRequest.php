<?php

namespace App\Modules\CreditRequest\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'document_type' => 'required',
            'document' => ['required', Rule::unique('users')],
            'g-recaptcha-response' => 'required|captcha'
        ];
    }

    public function createUser()
    {
        $data = $this->validated();
        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'document_type' => $data['document_type'],
            'document' => $data['document'],
            'password' => bcrypt(str_random(8)),
            'verification_code' => strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5)),
        ]);
        $user->assignRole('Credit');

        return $user;

    }
}
