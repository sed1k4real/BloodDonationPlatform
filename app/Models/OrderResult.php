<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderResult extends Model
{
    protected $table = 'order_results';

    protected $fillable = [
        'order_id',
        'status',
        'factor1',
        'factor2',
        'factor3',
        'factor4',
        'factor5'];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
    use HasFactory;
}
