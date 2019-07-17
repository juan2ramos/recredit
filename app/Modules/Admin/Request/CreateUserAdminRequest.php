<?php

namespace App\Modules\Admin\Request;

use App\Models\Point;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateUserAdminRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->isSuperAdmin();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'document_type' => 'required',
            'document' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required',
            'point' => 'required_if:role,Point',
        ];
    }

    public function createAdmin()
    {
        DB::transaction(function () {
            $data = $this->validated();
            $user = User::create([
                'name' => $this->name,
                'last_name' => $this->last_name,
                'document_type' => $this->document_type,
                'document' => $this->document,
                'email' => $this->email,
                'password' => bcrypt($this->password)
            ]);

            $user->save();

            $user->assignRole($data['role']);

            if (!empty ($data['point'])) {
                $point = Point::findOrFail($this->point);
                $point->user_id = $user->id;
                $point->save();
            }
        });
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'last_name.required' => 'El apellido es requerido',
            'document_type.required' => 'El tipo de documento es requerido',
            'document.required' => 'El documento es requerido',
            'document.unique' => 'El documento ya existe',
            'email.required' => 'El mail es requerido',
            'email.email' => 'El mail es invalido',
            'email.unique' => 'El mail ya existe',
            'password.required' => 'La contraseña es requerida',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'role.required' => 'El rol es requerido',
            'point.required_if' => 'El punto es requerido',
        ];
    }
}
