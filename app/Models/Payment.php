<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $dates = ['due_at'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function logs()
    {
        return $this->hasMany(PaymentLog::class);
    }
    
}