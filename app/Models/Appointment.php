<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'email',
        'date',
        'doctor',
        'phone',
        'message',
        'status',
        'user_id'
    ];

    protected $perPage = 10;
}
