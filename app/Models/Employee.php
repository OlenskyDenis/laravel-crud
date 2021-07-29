<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'gender',
        'salary',
        'departments'
    ];
    
    protected $casts = [
        'departments' => 'json',
    ];
}
