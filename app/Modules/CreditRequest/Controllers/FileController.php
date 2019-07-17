<?php

namespace App\Modules\CreditRequest\Controllers;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Modules\CreditRequest\Requests\FileRequest;

class FileController extends Controller
{
    use CreditRequestManager;

    public function index()
    {
        $this->authorize('view', File::class);

        $files = $this->files();

        return view('creditRequest.files', compact('files'));

    }

    public function store(FileRequest $request)
    {
        return $request->createFile();
    }

    public function destroy(File $file)
    {
        $this->authorize('view', $file);

        $file->delete();

        return ['success' => 'ok'];

    }


}
