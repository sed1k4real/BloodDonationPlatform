<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    protected $fillable = [
        'ref_blood',
        'qty'];
    use HasFactory;
}
