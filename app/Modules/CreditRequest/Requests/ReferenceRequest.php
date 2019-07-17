<?php

namespace App\Modules\CreditRequest\Requests;

use App\Models\Reference;
use Illuminate\Foundation\Http\FormRequest;

class ReferenceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'references.*.name' => 'required',
            'references.*.phone' => 'required',
            'references.0.phone' => ['numeric', 'digits:10',
                function ($attribute, $value, $fail) {
                    $user = $this->getUserToCreate();
                    if ($value === $user->client->mobile) {
                        $fail('No debe ser el celular del usuario');
                    }
                },
                function ($attribute, $value, $fail) {
                    $user = $this->getUserToCreate();
                    if ($value == $user->document) {
                        $fail('No debe ser el número de indetificación');
                    }
                }
            ],
            'references.1.phone' => ['numeric', 'digits:10', 'different:references.0.phone',
                function ($attribute, $value, $fail) {
                    $user = $this->getUserToCreate();
                    if ($value == $user->client->mobile) {
                        $fail('No debe ser el celular del usuario');
                    }
                },
                function ($attribute, $value, $fail) {
                    $user = $this->getUserToCreate();
                    if ($value == $user->document) {
                        $fail('No debe ser el número de indetificación');
                    }
                }
            ],
        ];
    }

    public function createReferences()
    {
        $data = $this->all();
        $user = $this->getUserToCreate();

        $user->references()->saveMany(
            [
                new Reference([
                    'name' => $data['references'][0]['name'],
                    'phone' => $data['references'][0]['phone']
                ]),
                new Reference ([
                    'name' => $data['references'][1]['name'],
                    'phone' => $data['references'][1]['phone']
                ])
            ]);

    }

    public function updateReferences($references)
    {
        $referencesInput = $this->references;

        foreach ($referencesInput as $referenceInput) {

            $reference = $references->find($referenceInput['id']);

            $reference->name = $referenceInput['name'];
            $reference->phone = $referenceInput['phone'];

            $reference->save();
        }
    }

    private function getUserToCreate()
    {
        return ($this->user()->isAdmin()) ? session('userProcess') : $this->user();
    }
}
