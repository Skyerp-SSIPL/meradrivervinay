<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'company_name', 'location', 'job_type', 'salary',
        'license_type', 'experience', 'age_requirement', 'languages',
        'education_level', 'vehicle_provided', 'vehicle_type', 'shift_timing',
        'description', 'route_type', 'working_hours', 'benefits',
        'contact_person', 'phone', 'email', 'deadline', 'how_to_apply',
    ];
    
}
