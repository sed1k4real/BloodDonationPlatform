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
        'gender_ref',
        'role_ref',
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
    use HasFactory;
}
