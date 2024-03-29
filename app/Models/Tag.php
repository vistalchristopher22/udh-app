<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return date('F d, Y h:i A', strtotime($value));
    }
}
