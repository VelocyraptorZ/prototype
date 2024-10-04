<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentItem extends Model
{
    use HasFactory;
    protected $table='document_item';

    protected $casts = [
        'taxes' => 'array',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
