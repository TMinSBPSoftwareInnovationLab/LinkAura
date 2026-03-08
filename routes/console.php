<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// உங்கள் Plan Expiry கமெண்ட்டை இங்கே சேர்க்கவும்
Schedule::command('app:check-plan-expiry')->daily()->appendOutputTo(storage_path('logs/plan_expiry.log'));