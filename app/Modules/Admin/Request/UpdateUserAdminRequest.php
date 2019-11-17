<?php

namespace App\Modules\Admin\Request;

use App\Models\Point;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UpdateUserAdminRequest extends FormRequest
{

    public function authorize()
    {
        return (auth()->user()->isSuperAdmin() || auth()->user()->isDocumentary() || auth()->user()->isAnalysts());
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'document_type' => 'required',
            'document' => ['required', Rule::unique('users')->ignore($this->user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'password' => '',
            'role' => 'required',
            'point' => 'required_if:role,Point',
        ];
    }

    public function updateUser(User $user)
    {

        $data = $this->all();

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }


        $user->update($data);
        $user->assignRole($data['role']);

        if (!empty ($data['point'])) {
            $point = Point::findOrFail($this->point);
            $point->user_id = $user->id;
            $point->save();
        }

    }


}
