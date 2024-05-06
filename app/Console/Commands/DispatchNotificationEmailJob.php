<?php

namespace App\Console\Commands;

use App\Jobs\NotificationEmail;
use App\Models\Notification;
use App\Models\Notification_admins;
use App\Models\User;
use Illuminate\Console\Command;

class DispatchNotificationEmailJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispatch:notification-email-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'runs Notification Email job';

    /**
     * Execute the console command.
     */
    public function handle()
    {

    }
}
