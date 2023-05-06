<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'donation_id',
        'status',
        'factor1',
        'factor2',
        'factor3',
        'factor4',
        'factor5'];

    public function donation()
    {
        return $this->hasOne(Donation::class);
    }
    use HasFactory;
}
