<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends User
{
    protected $fillable = [
        'user_id',
        'chro_dis',
        'blood_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function donation()
    {
        return $this->hasMany(Donation::class);
    }

    public function bloodCategory()
    {
        return $this->belongsTo(BloodCategory::class);
    }
    use HasFactory;
}
