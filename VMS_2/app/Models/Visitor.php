<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Visitor extends Model
{
    protected $fillable = [
        'name',
        'mobile',
        'purpose',
        'person_to_meet',
        'id_proof_type',
        'id_proof_number',
        'address',
        'age',
        'gender',
        'department',
        'block',
        'floor',
        'designation',
        'photo'
    ];

}
