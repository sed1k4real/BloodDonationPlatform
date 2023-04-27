<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'don_ref',
        'factor1',
        'factor2',
        'factor3',
        'factor4',
        'factor5'];
    use HasFactory;
}
