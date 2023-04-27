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

    public function receiver()
    {
        return $this->belongsTo(Receiver::class);
    }
    public function bloodCategory()
    {
        return $this->belongsTo(BloodCategory::class);
    }
    use HasFactory;
}
