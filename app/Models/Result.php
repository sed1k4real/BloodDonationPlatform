<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'don_ref',
        'status',
        'factor1',
        'factor2',
        'factor3',
        'factor4',
        'factor5'];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
    use HasFactory;
}
