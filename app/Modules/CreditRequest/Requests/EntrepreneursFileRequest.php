<?php

namespace App\Modules\CreditRequest\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EntrepreneursFileRequest extends FormRequest
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
        $file = $this->file('files');
        return Storage::putFile('creditos', $file, 'public');
    }


}
