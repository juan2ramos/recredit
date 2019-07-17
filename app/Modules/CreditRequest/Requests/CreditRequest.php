<?php

namespace App\Modules\CreditRequest\Requests;

use App\Models\Credit;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class CreditRequest extends FormRequest
{

    public function authorize()
    {
        return $this->getUserToCreate()->hasFiles();
    }

    public function rules()
    {
        return [];
    }

    public function createCredit()
    {
        $user = $this->getUserToCreate();

        $user->credit()->save(new Credit([
            'priority' => $this->user()->isAdmin() ,
            'value' => '300000',
            'state' => 0,
            'finished_user' => $this->user()->id ,
        ]));

    }

    private function getUserToCreate(): User
    {
        return $this->user()->isAdmin() ? $this->session->get('userProcess') : $this->user();
    }
}
