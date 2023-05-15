<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodCategory extends Model
{
    protected $table = 'blood_categories';

    protected $fillable = [
        'category',
        'symbol',
        'qty'
    ];

    public function donor()
    {
        return $this->hasMany(Donor::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    use HasFactory;
}
