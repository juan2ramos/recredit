<?php

namespace App\Modules\CreditRequest\Requests;

use App\Models\Client;
use App\Models\Credit;
use App\Models\File;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EntrepreneursRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'document_type' => 'required',
            'policyPinkLife' => 'required',
            'privacyPolicy' => 'required',
            'document' => ['required', Rule::unique('users')],
            'g-recaptcha-response' => 'required|captcha',
            'address' => 'required',
            'residency_city' => 'required',
            'mobile' => ['required', 'digits:10'],
            'point' => 'required',
            'images' => '',
        ];
    }

    public function createUser()
    {

        $user = DB::transaction(function () {

            $data = $this->validated();
            $user = User::create([
                'name' => $data['name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'document_type' => $data['document_type'],
                'document' => $data['document'],
                'password' => bcrypt(Str::random(10)),
                'verification_code' => strtoupper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5)),
            ]);
            $user->assignRole('Credit');
            $client = new Client([
                'address' => $data['address'],
                'residency_city' => $data['residency_city'],
                'mobile' => $data['mobile'],
                'point_id' => $data['point'],
            ]);
            $user->client()->save($client);

            if (!empty($data['images'])) {
                $i = 1;
                foreach ($data['images'] as $image) {
                    $file = new File([
                        'name' => $user->document . '-' . $i,
                        'url' => $image
                    ]);
                    $i++;
                    $user->files()->save($file);
                }
            }
            $user->credit()->save(new Credit([
                'priority' => (auth()->check() && auth()->user()->isAdmin()) ? 1 : 0,
                'state' => 0,
                'validated' => 0,
                'number_requested' => 1,
                'isEntrepreneurs' => 1,
                'finished_user' => (auth()->check() && auth()->user()->isAdmin()) ? auth()->user()->id : $user->id
            ]));
            $this->sendMail($this->user());
            return $user;
        });
        return $user;

    }
    private function sendMail($user)
    {
        \MailTemplate::to($user->email);
        \MailTemplate::send(242);

        \MailTemplate::reset();

        // $users = User::role(['Analysts'])->get();
        //\MailTemplate::to($users);
        //\MailTemplate::attribute('NAME', $user->name);
        //\MailTemplate::attribute('NUMBER', $user->document);
        //\MailTemplate::send(243);
    }

}
