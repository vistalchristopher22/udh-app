<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    public $keyType = 'string';

    public $incrementing = false;

    public $primaryKey = 'employee_id';

    protected $guarded = [];

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name.' '.$this->last_name,
        );
    }

    public function office_detail(): BelongsTo
    {
        return $this->belongsTo(Office::class, 'office', 'id');
    }

    public function position_detail(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'position', 'id');
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (?string $value) => (strlen($value) === 0) ? $this->password : Hash::make($value),
        );
    }
}
