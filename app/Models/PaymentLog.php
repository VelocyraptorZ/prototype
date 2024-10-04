<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $dates=['paid_at'];
    
    public function payment()
    {
        return $this->belongsTo(Document::class);
    }

    public function payment_mode()
    {
        return $this->belongsTo(PaymentMode::class);
    }
}