<?php
namespace App\Classes;

class KonversiNH
{
    public static function konversi($na) {
        if ($na >= 85) {
            $nh = 'A';
        } elseif ($na >= 80) {
            $nh = 'A-';
        } elseif ($na >= 75) {
            $nh = 'B+';
        } elseif ($na >= 70) {
            $nh = 'B';
        } elseif ($na >= 65) {
            $nh = 'B-';
        } elseif ($na >= 60) {
            $nh = 'C+';
        } elseif ($na >= 55) {
            $nh = 'C';
        } elseif ($na >= 40) {
            $nh = 'D';
        } else {
            $nh = 'E';
        }

        return $nh;
    }
}
