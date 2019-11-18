<?php


namespace App\Modules\Admin\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Credit;
use App\Models\CreditHistory;
use App\User;
use Illuminate\Support\Facades\Auth;

class ReconsiderationController extends Controller
{
    public function __invoke(User $user)
    {
        if (!$user->credit->reconsideration) {
            return ['success' => false];
        }
        $this->createCreditHistory($user);
        $user->credit->delete();
        return ['success' => true];

    }

    protected function createCreditHistory($user)
    {
        $r1 = $user->references->shift();
        $r2 = $user->references->shift();

        CreditHistory::create([
            'name' => $user->name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'other_mail' => $user->other_mail,
            'document_type' => $user->document_type,
            'document' => $user->document,

            'residency_city' => $user->client->residency_city,
            'address' => $user->client->address,
            'mobile' => $user->client->mobile,
            'phone' => $user->client->phone,

            'name_reference_1' => $r1->name,
            'phone_reference_1' => $r1->phone,
            'name_reference_2' => $r2->name,
            'phone_reference_2' => $r2->phone,

            'files' => $user->files->implode('url', ', '),

            'user_id' => $user->id,
        ]);
    }

}
