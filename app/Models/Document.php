<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    public $casts = [
        'uploaded_at' => 'datetime',
    ];

    protected $guarded = [];

    public function uploaded_by_detail(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'uploaded_by', 'employee_id');
    }

    public function office_responsible_detail(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'office_responsible', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function how_to_complete()
    {
        return $this->hasMany(ServiceProcess::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
}
