<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'don_date',
        'room_ref',
        'donor_ref',
        'don_qty',
        'type',
        'skd_ref',
        'camp_ref',
        'user_ref'];
    use HasFactory;
}
