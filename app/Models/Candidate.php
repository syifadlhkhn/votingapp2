<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'vote_count', // Sesuaikan dengan atribut yang ada pada model Candidate Anda
    ];
}
