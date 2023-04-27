<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    protected $fillable = [
        'rqst_date',
        'rec_ref',
        'blood_type',
        'rqst_qty',
        'status',
        'date_limit'];
    use HasFactory;
}
