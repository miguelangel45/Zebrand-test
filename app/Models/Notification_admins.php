<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification_admins extends Pivot
{
    use SoftDeletes;
    protected $table = 'notifications_admins';

    protected $fillable = ['notification_id', 'user_id'];

    public function notification(){
        return $this->belongsToMany(Notification::class);
    }

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
