<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Models\Notification_admins;
use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private ?Notification $notification = null;
    private ?Notification_admins $notification_admins = null;
    private ?User $user = null;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): string
    {
        echo date('Y-m-d H:i:s')." starting notification email\n";

        $notifications = (new Notification)->all();

        foreach ($notifications as $notification) {
            $admins = (new User)->where([
                ['role','=','admin'],
                ['id', '!=', $notification->user_id],
            ])->get();
            foreach ($admins as $admin) {
                $productToSend = json_decode($notification->original_record, true);
                $product = new Product();
                $product->fill($productToSend);
                $notificationAdmins = new Notification_admins();
                $notificationAdmins->notification_id = $notification->id;
                $notificationAdmins->user_id = $admin->id;
                $notificationAdmins->save();
                Mail::to($admin)->send(new \App\Mail\NotificationEmail($admin, $product));
                Log::info('Mail sent to: '.$admin->email);
                sleep(5);
            }
            $notification->delete();
            $notification->save();
        }
        echo date('Y-m-d H:i:s')." notification email sent\n";
        return "Job dispatched successfully";
    }
}
