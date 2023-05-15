<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receiver extends User
{
    protected $fillable = [
        'user_id',
        'authority',
        'position',
        'status'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function order()
    {
        return $this->hasMany(Order::class);
    }

    use HasFactory;
}
