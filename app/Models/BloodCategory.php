<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodCategory extends Model
{
    protected $fillable = [
        'ref',
        'catg',
        'symbol'];
    use HasFactory;
}
