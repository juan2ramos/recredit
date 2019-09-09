<?php

namespace App\Modules\CreditRequest\Requests;

use App\Models\Credit;
use App\Notifications\NewRequestCredit;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Notification;

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
            'priority' => $this->user()->isAdmin(),
            'state' => 0,
            'validated' => 0,
            'number_requested' => 1,
            'finished_user' => $this->user()->id,
        ]));
        $this->notify($this->user());
        $this->sendMail($this->user());
    }

    private function sendMail($user)
    {
        MailTemplate::to($user->email);
        MailTemplate::send(240);

        MailTemplate::reset();

        $users = User::role(['Analysts'])->get();
        MailTemplate::to($users);
        MailTemplate::attribute('NAME', $user->name);
        MailTemplate::attribute('NUMBER', $user->document);
        MailTemplate::send(243);
    }

    private function getUserToCreate(): User
    {
        return $this->user()->isAdmin() ? $this->session->get('userProcess') : $this->user();
    }

    private function notify($user)
    {
        $analysts = User::role(['Analysts'])->get();
        Notification::send($analysts, new NewRequestCredit($user));
    }
}
