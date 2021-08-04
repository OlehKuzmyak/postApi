<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'body',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSetActive($querry)
    {
       return  $querry->update(['is_active' => true]);
    }

    public function scopeSetInActive($querry)
    {
        return  $querry->update(['is_active' => false]);
    }
}
