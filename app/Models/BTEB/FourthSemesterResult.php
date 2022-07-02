<?php

namespace App\Models\BTEB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FourthSemesterResult extends Model
{
    use HasFactory;
    protected $fillable = ['roll', 'point', 'failed_subjects', 'session', 'semester', 'grade'];
}
