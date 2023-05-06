<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'planing_id',
        'date',
        'time',
        'dons_num'];

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
