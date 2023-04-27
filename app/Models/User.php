<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'last_name',
        'username',
        'role_ref',
        'email',
        'email_verified_at',
        'password'];

        public function donation()
        {
            return $this->hasMany(Donation::class);
        }
        public function role()
        {
            return $this->belongsTo(Role::class);
        }
    use HasFactory;
}
