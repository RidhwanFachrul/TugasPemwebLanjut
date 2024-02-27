<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['nilai_partisipasi', 'nilai_tugas', 'nilai_uts', 'nilai_uas', 'na', 'nh'];
}
