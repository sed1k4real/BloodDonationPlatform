<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $fillable = [
        'inst_name',
        'email',
        'tel',
        'address',
        'username',
        'password'];

    public function request()
    {
        return $this->hasMany(BloodRequest::class);
    }
    use HasFactory;
}
