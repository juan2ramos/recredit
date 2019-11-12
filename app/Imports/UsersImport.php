<?php

namespace App\Imports;

use App\Models\Client;
use App\Models\Credit;
use App\Models\Reference;
use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    public function collection(Collection $rows)
    {


        foreach ($rows as $key => $row) {
            if (empty(User::where('document', $row[7])->orWhere('email', $row[2])->first())) {
                $user = User::create([
                    'name' => $row[0],
                    'last_name' => $row[1],
                    'email' => $row[2],
                    'other_mail' => $row[3],
                    'email_verified_at' => $row[4],
                    'password' => $row[5],
                    'document_type' => $row[6],
                    'document' => $row[7],
                    'verification_code' => $row[8],
                    'verification_state' => $row[9],
                    'remember_token' => $row[10],
                ]);


                $client = Client::create([
                    'residency_city' => $row[11],
                    'address' => empty($row[12]) ? '0' : $row[12],
                    'mobile' => empty($row[13]) ? '0' : $row[13],
                    'phone' => $row[14],
                    'point_id' => $row[15],
                    'user_id' => $user->id
                ]);

                Credit::create([
                    'priority' => $row[16],
                    'state' => $row[17],
                    'validated' => $row[18],
                    'check_date' => now(),
                    'number_requested' => $row[20],
                    'value' => $row[21],
                    'reasons_id' => $row[22],
                    'finished_user' => $row[23],
                    'assigned_user' => $row[24],
                    'reviewed_user' => $row[25],
                    'user_id' => $user->id,
                ]);

                if (!empty($row[26])) {
                    Reference::create([
                        'user_id' => $user->id,
                        'name' => $row[26],
                        'phone' => $row[27]
                    ]);
                }
                if (!empty($row[28])) {
                    Reference::create([
                        'user_id' => $user->id,
                        'name' => $row[28],
                        'phone' => $row[29]
                    ]);
                }

            }
            /**/
        }

    }
}
