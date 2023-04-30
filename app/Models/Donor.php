<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends User
{
    protected $fillable = [
        'chro_dis',
        'blood_type'];

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
