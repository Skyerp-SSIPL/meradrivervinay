<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
     protected $table ='job_types';
     protected $primaryKey ='id';
     public $timestamps = true;
     protected $fillable = [
        'name',
        'created_by',
        'status',
        'updated_by'
     ];
     // protected $dates = ['created_at', 'updated_at'];
    
}
