<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'address',
        'tel',
        'email',
        'gender',
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
