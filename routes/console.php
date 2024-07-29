<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\InsertDataCommand;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Artisan::command('insert:data', function () {
//     $command = new InsertDataCommand();
//     $command->handle();
// })->describe('Insert data into the users table');

app(Schedule::class)->command('insert:data')->everyMinute();
