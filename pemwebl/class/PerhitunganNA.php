<?php
namespace App\Classes;
use App\Http\Controllers\Controller;

class PerhitunganNA extends Controller
{
    public static function hitung($nilai_partisipasi, $nilai_tugas, $nilai_uts, $nilai_uas)
    {
        $na = (($nilai_partisipasi * 2) + ($nilai_tugas * 3) + ($nilai_uts * 2) + ($nilai_uas * 3)) / 10;
        return $na;
    }
}