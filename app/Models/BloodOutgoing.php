<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodOutgoing extends Model
{
    protected $fillable = [
        'ref_rqst',
        'qty_rqst',
        'date_rqst'];
    use HasFactory;
}
