<?php

namespace App\Modules\CreditRequest\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class ClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'address' => 'required',
            'residency_city' => 'required',
            'mobile' => ['required', function ($attribute, $value, $fail) {
                $user = $this->getUserToCreate();
                if (!$user->verification_state) {
                    $fail('No se ha validado el número de celular');
                }
            }],
            'phone' => '',
            'point' => 'required'
        ];
    }

    public function createClient()
    {

        DB::transaction(function () {
            $user = $this->getUserToCreate();
            $data = $this->validated();
            $client = new Client([
                'address' => $data['address'],
                'residency_city' => $data['residency_city'],
                'mobile' => $data['mobile'],
                'phone' => $data['phone'],
                'point_id' => $data['point'],
            ]);
            $user->client()->save($client);
        });

    }

    public function updateClient()
    {
        $client = $this->getUserToCreate()->client;
        $data = $this->validated();

        $client->fill([
            'address' => $data['address'],
            'residency_city' => $data['residency_city'],
            'mobile' => $data['mobile'],
            'phone' => $data['phone'],
            'point' => $data['point'],
        ]);

        $client->save();
    }

    private function getUserToCreate()
    {
        return ($this->user()->isAdmin()) ? session('userProcess') : $this->user();
    }
}
