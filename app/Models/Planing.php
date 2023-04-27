<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    protected $fillable = [
        'month',
        'year',
        'status'];

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }
    use HasFactory;
}
