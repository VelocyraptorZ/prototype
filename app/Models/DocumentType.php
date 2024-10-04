<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $casts = [
        'statuses' => 'array',
    ];
    
    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function next()
    {
        return $this->hasOne(DocumentType::class);
    }

    public function previous()
    {
        return $this->belongsTo(DocumentType::class);
    }
}
