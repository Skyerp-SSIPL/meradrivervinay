<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverCategoryStatus extends Model
{
	protected $table = "driver_category_status";
    protected $fillable = ['status', 'name', 'color'];
}
