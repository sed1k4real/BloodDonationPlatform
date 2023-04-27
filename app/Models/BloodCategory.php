<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodCategory extends Model
{
    protected $fillable = [
        'ref',
        'catg',
        'symbol'];

    public function donor()
    {
        return $this->hasMany(Donor::class);
    }

    public function bloodRequest()
    {
        return $this->hasMany(BloodRequest::class);
    }
    use HasFactory;
}
