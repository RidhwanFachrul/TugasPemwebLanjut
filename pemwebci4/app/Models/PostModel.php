<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts'; // Nama tabel database
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields = ['nilai_partisipasi', 'nilai_tugas', 'nilai_uts', 'nilai_uas', 'na', 'nh']; 
    
}