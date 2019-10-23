<?php

namespace App\Modules\SMS;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SendSMS extends Controller
{
    use SMSManager;

    public function __invoke(Request $request)
    {
        $request->validate(['mobile' => 'required']);
        $this->authorize('view', Client::class);

        return $this->sendingMessage($request->mobile);

    }

    private function sendingMessage($mobile)
    {
        $res = $this->client->request('POST', $this->urlSMS, [
            'auth' => $this->authData,
            'json' => [
                'from' => 'InfoSMS',
                'to' => "57{$mobile}",
                'text' => $this->buildTextMessage(),
            ]
        ]);

        return ['status' => $res];
    }


    private function buildTextMessage()
    {
        $user = Auth::user()->isAdmin() ? session('userProcess') : Auth::user();

        return "Solicitud Créditos Lilipink:  código de verificación: {$user->verification_code}";

    }

}
