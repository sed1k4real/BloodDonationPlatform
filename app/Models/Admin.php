<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    use HasFactory;
    public function donation()
    {
        return $this->hasMany(Donation::class);
    }
    public function request()
    {
        return $this->hasMany(Request::class);
    }
}
