<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donation_date',
        'room_id',
        'donor_id',
        'admin_id',
        'schedule_id',
        'donation_qty'];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function admin()
    {
        return $this->belongsTo(User::class);
    }
    public function result()
    {
        return $this->hasOne(Result::class);
    }
    
    use HasFactory;
}
