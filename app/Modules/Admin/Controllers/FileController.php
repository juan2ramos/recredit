<?php

namespace App\Modules\Admin\Controllers;


use App\Http\Controllers\Controller;
use App\Models\File;
use App\Modules\Admin\Request\FileRequest;

class FileController extends Controller
{

    public function store(FileRequest $request)
    {
        return $request->createFile();
    }

    public function destroy(File $file)
    {
        $this->authorize('superAdmin');
        $file->delete();

        return ['success' => 'ok'];

    }

}
