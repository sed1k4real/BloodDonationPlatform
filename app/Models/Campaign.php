<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'strt_date',
        'end_date'];
    
    public function donation()
    {
        return $this->hasMany(Donation::class);
    }
    public function address()
    {
        return $this->hasMany(Address::class);
    }
    use HasFactory;
}
