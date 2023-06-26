<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designations extends Model
{
    use HasFactory;

    protected $fillable = ['designation_id', 'company_id', 'department_id', 'sub_department_id', 'designation_name', 'added_by', 'status'];
}
