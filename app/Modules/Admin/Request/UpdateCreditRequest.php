<?php
namespace App\Modules\Admin\Request;


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

    }

}
