<?php

namespace App\Models;

use App\Jobs\NotificationEmail;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products'; // Specify the table name

    protected $primaryKey = 'sku';

    protected $fillable = ['sku', 'name', 'price', 'searched_count', 'brand_id'];

    public static function boot()
    {
        parent::boot();

        self::updated(function ($model) {
            $originalData = $model->getOriginal();

            // Create a notification record
            $newNotification = Notification::create([
                'user_id' => auth()->user()->id, //getting id from auth
                'original_record' => json_encode($originalData),
                'modified_record' => json_encode($model->toArray()),
            ]);

            if($newNotification) {
                NotificationEmail::dispatch()->delay(now()->addSeconds(2));
            }
        });
    }

    // Define the brand relationship
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function countIncrement($id){
        $currentCount = $this->with('brand')->where('sku', $id)->first();
        $currentCount->update([
            'searched_count' => $currentCount->searched_count +1
        ]);
        return $currentCount;
    }
}
