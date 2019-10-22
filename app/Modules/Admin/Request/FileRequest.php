<?php

namespace App\Modules\Admin\Request;

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
        return auth()->user()->isSuperAdmin() || auth()->user()->isDocumentary();
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
            $user = User::find($this->input('user'));

            $file = File::create([
                'name' => $file->getClientOriginalName() . '-' . $user->document . '-' . Str::random(4),
                'url' => $path,
                'user_id' => $user->id
            ]);

            return $file;
        });
    }


}
