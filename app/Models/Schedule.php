<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'plan_ref',
        'date',
        'time',
        'nb'];

    public function planing()
    {
        return $this->belongsTo(Planing::class);
    }
    public function donation()
    {
        return $this->hasMany(Donation::class);
    }
    use HasFactory;
}
