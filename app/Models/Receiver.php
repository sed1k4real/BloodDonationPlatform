<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends User
{
    protected $fillable = [
        'user_ref'
        ];

    public function request()
    {
        return $this->hasMany(BloodRequest::class);
    }
    use HasFactory;
}
