<?php

namespace App\Modules\Admin\Request;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        return (auth()->user()->isSuperAdmin() || auth()->user()->isDocumentary() || auth()->user()->isAnalysts()) && $this->user->credit->validated;
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
        $user->credit->update($data);

        if ($user->validations) {
            $data = $this->mergeData($data);
            $user->validations->update($data);
        } else {
            $user->validations()->create([
                'documentValidation' => $data['documentValidation'] ?? 0,
                'authorization' => $data['authorization'] ?? 0,
                'fingerprint' => $data['fingerprint'] ?? 0,
                'dataCredit' => $data['dataCredit'] ?? 0,
                'observation' => $data['observation'] ?? '',
                'other' => $data['other'] ?? '',
            ]);
        }
        if(isset($data['references']))
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
    private function mergeData($data){
        $validation =
            [
                'documentValidation' => 0,
                'authorization' => 0,
                'fingerprint' => 0,
                'observation' => '',
                'other' => '',
                'dataCredit' => 0
            ];
        ;
        return array_merge($validation, $data);
    }

}
