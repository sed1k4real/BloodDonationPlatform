<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'don_date',
        'room_ref',
        'donor_ref',
        'admin_ref',
        'skd_ref',
        'don_qty'];

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
        return $this->hasMany(Result::class);
    }
    use HasFactory;
}
