<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'camp_ref',
        'address',
        'bus_num'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    use HasFactory;
}