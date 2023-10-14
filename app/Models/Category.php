<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes, Actionable;
    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return date('F d, Y h:i A', strtotime($value));
    }
}
