<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'uploaded_at',
        'file_path',
        'file_content',
        'file_type',
        'size',
        'version',
        'thumbnail',
        'status',
        'uploaded_by',
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
