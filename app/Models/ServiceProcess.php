<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProcess extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function person_in_charge()
    {
        return $this->belongsTo(Employee::class, 'look_for', 'employee_id');
    }

    public function secretary()
    {
        return $this->belongsTo(Employee::class, 'secretary', 'employee_id');
    }

    public function requirements()
    {
        return $this->hasMany(ServiceProcessRequirements::class, 'service_process_id');
    }
}
