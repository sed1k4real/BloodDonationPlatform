<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'birthday',
        'blood_type',
        'gender',
        'role',
        'email',
        'password'];

        public function jobs()
        {
            return $this->hasMany(Job::class);
        }
        //Getters
        public function getAuthIdentifier()
        {
            return $this->id;
        }
        public function getAuthIdentifierFirstName()
        {
            return $this->getAttribute('first_name');
        }
        public function getAuthIdentifierPhone()
        {
            return $this->getAttribute('phone_number');
        }
        public function getAuthIdentifierBirthdate()
        {
            return $this->getAttribute('birthday');
        }
        public function getAuthIdentifierBloodType()
        {
            return $this->getAttribute('blood_type');
        }
        public function getAuthPassword()
        {
            return $this->getAttribute('password');
        }
        
        public function getRememberToken()
        {
            return null;
        }
        public function getRememberTokenName()
        {
            return null;
        }
        // Setters
        public function setRememberToken($value)
        {
            return null;
        }
    use HasFactory;
}
