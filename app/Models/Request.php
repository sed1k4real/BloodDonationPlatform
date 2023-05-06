<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'date',
        'deadline',
        'receiver_id',
        'admin_id',
        'blood_type',
        'qty'];
    public function receiver()
    {
        return $this->belongsTo(Receiver::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function bloodCategory()
    {
        return $this->belongsTo(BloodCategory::class);
    }

    use HasFactory;
}
