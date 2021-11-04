<?php

namespace App\Models;

use App\Notifications\BookingNotification;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;
use Illuminate\Support\Facades\Notification;

class Booking extends Model
{
    use SoftDeletes, HasFactory,MultiTenantModelTrait;

    public $table = 'bookings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_SELECT = [
        '1' => 'Confirmed',
        '2' => 'Cancelled',
        '0' => 'Pending',
    ];

    protected $fillable = [
        'house_id',
        'names',
        'email',
        'mobile',
        'status',
        'created_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function booting()
    {
        self::updated(function(Booking  $booking){
            if ($booking->isDirty('status') && in_array($booking->status,['Confirmed','Cancelled'])){
                Notification::route('mail',$booking->email)->notify(new BookingNotification($booking->status));
            }
        });
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function house(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(House::class, 'house_id');
    }
    public function created_by(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
