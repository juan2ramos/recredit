<?php

namespace App\Modules\Admin\Request;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->user()->isSuperAdmin() && $this->user->credit->validated;
    }

    public function rules()
    {
        return [

            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'document_type' => 'required',
            'document' => ['required', Rule::unique('users')->ignore($this->user->id)],
            'password' => '',

            'address' => 'required',
            'residency_city' => 'required',
            'mobile' => ['required', 'digits:10'],
            'phone' => '',
            'point' => 'required',

            'references.*.name' => 'required',
            'references.*.phone' => 'required',

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

        $data['point_id'] = $data['point'];

        $user->update($data);
        $user->client->update($data);
        $this->updateReferences($user, $data['references']);

    }

    private function updateReferences(User $user, $referencesInput)
    {
        $references = $user->load('references')->references;

        foreach ($referencesInput as $referenceInput) {

            $reference = $references->find($referenceInput['id']);

            $reference->name = $referenceInput['name'];
            $reference->phone = $referenceInput['phone'];

            $reference->save();
        }
    }

}
