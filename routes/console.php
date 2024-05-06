<?php

use App\Jobs\NotificationEmail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;


Schedule::job(new NotificationEmail)->everyThirtySeconds()->withoutOverlapping();
