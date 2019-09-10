<?php

namespace App\Modules\Admin\Request;


use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCreditRequest extends FormRequest
{
    public function authorize()
    {
        return !$this->credit->validated;
    }

    public function rules()
    {
        return [
            'reason' => 'required',
            'approved' => 'required'
        ];
    }

    public function updateCredit()
    {
        $this->credit->fill([
            'state' => $this->input('approved') ? 1 : 2,
            'validated' => 1,
            'check_date' => now(),
            'reasons_id' => $this->input('reason'),
            'reviewed_user' => Auth::user()->id,
        ]);

        $this->credit->save();
        $this->sendMail($this->credit->user);
    }

    private function sendMail($user)
    {
        \MailTemplate::to($user->email);
        if ($this->input('approved') == 1) {
            $r = 'Aprobado';
            \MailTemplate::send(241);
        } else {
            $r = 'Negado';
            \MailTemplate::send(242);
        }

        \MailTemplate::reset();

        $finish = $this->credit->load('userFinish');
        if ($finish->user->hasRole('Point')) {
            \MailTemplate::attribute('RESPONSE', $r);
            \MailTemplate::attribute('NUMBER', $user->document);
            \MailTemplate::send(244);
        }
    }

}
