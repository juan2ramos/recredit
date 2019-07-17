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
            'reasons_id' => $this->input('reason'),
            'user_reviewed' => Auth::user()->id,
            'validated' => 1,
        ]);

        $this->credit->save();

    }

}
