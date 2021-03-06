<?php

namespace App\Modules\CreditRequest\Requests;

use App\Models\File;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'files' => 'required|mimes:jpeg,png,jpg,pdf|max:4096',
        ];
    }

    public function createFile()
    {
        return DB::transaction(function () {

            $file = $this->file('files');
            $path = Storage::putFile('creditos', $file, 'public');
            $user = $this->getUserToCreate();

            $file = File::create([
                'name' => $file->getClientOriginalName() . '-' . $user->document . '-' . Str::random(4),
                'url' => $path,
                'user_id' => $user->id
            ]);

            return $file;
        });
    }

    private function getUserToCreate(): User
    {
        return $this->user()->isAdmin() ? session('userProcess') : $this->user();
    }
}
