<?php

namespace App\Modules\Admin\Controllers;

use App\Jobs\GenerateExcel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadExcel extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        GenerateExcel::dispatch($request->date_init, $request->date_end, $user);
        return ['success' => $request->date_init];
    }
}
