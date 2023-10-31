<?php

namespace App\Models;

use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Actionable, HasFactory, SoftDeletes;

    protected $guarded = [];

    public function getCreatedAtAttribute($value)
    {
        return date('F d, Y h:i A', strtotime($value));
    }
}
