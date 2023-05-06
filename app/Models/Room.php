<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_name'];

    public function donation()
    {
        return $this->hasMany(Donation::class);
    }
    use HasFactory;
}
