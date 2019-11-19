<?php

namespace App\Jobs;

use App\Exports\UsersExport;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class GenerateExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dateInit;
    protected $dateEnd;

    public function __construct($dateInit, $dateEnd)
    {
        $this->dateInit = $dateInit;
        $this->dateEnd = $dateEnd;
    }

    public function handle()
    {
        $str = Str::random(10);
        Excel::store(new UsersExport($this->dateInit, $this->dateInit), 'creditos/Excel/users-' .$str. '.xlsx', 'spaces');
        $url = Storage::temporaryUrl('creditos/Excel/users.xlsx', now()->addMinutes(120));

        \MailTemplate::to('juan2ramos@gmail.com');
        \MailTemplate::attribute('URL', $url);
        \MailTemplate::send(263);
    }
}
