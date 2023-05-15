<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'deadline',
        'admin_id',
        'blood_id',
        'order_qty',
        'receiver_id'
    ];
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
    
    public function result()
    {
        return $this->hasOne(OrderResult::class);
    }
    use HasFactory;
}
