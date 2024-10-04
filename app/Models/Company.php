<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'mobile',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasMany(Documents::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function stores()
    {
        return $this->hasManyThrough(Store::class, Address::class);
    }
}
