<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $dates = ['expected_dispatch_date', 'actual_dispatch_date'];
    
    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}