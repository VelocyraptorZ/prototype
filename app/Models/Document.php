<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $casts = [
        'data' => 'array',
        'taxes' => 'array',
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('id','quantity')->withTimestamps();
    }

    public function documentItems()
    {
        return $this->hasMany(DocumentItem::class);
    }

    public function buyer_company()
    {
        return $this->belongsTo(Company::class, 'buyer_company_id', 'id');
    }
    
    public function seller_company()
    {
        return $this->belongsTo(Company::class, 'seller_company_id', 'id');
    }
    
    public function place_of_supply()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function shipment()
    {
        return $this->hasOne(Shipment::class);
    }
    
    public function statuses()
    {
        return $this->hasMany(DocumentStatus::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    
    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function next()
    {
        return $this->hasOne(Document::class);
    }

    public function previous()
    {
        return $this->belongsTo(Document::class);
    }
}