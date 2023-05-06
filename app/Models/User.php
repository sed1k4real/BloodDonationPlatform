<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'last_name',
        'first_name',
        'birthdate',
        'gender_id',
        'role_id',
        'tel',
        'email',
        'email_verified_at',
        'password'];

        public function role()
        {
            return $this->belongsTo(Role::class);
        }
        public function gender()
        {
            return $this->belongsTo(Gender::class);
        }
        public function donor()
        {
            return $this->hasMany(Donor::class);
        }
        public function admin()
        {
            return $this->hasMany(Admin::class);
        }
        public function receiver()
        {
            return $this->hasMany(Receiver::class);
        }
        use HasFactory;
}
