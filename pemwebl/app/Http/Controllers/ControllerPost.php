<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Classes\PerhitunganNA;
use App\Classes\KonversiNH;

class ControllerPost extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('app', compact('posts'));
    }
    public function store(Request $request)
    {
        
        $request->validate([
            'nilai_partisipasi' => 'required|numeric',
            'nilai_tugas' => 'required|numeric',
            'nilai_uts' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
        ]);


        $na = (($request->nilai_partisipasi * 2) + ($request->nilai_tugas * 3) + ($request->nilai_uts * 2) + ($request->nilai_uas * 3)) / 10;

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


        Post::create([
            'nilai_partisipasi' => $request->nilai_partisipasi,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'na' => $na,
            'nh' => $nh,
        ]);
    
        return redirect()->route('app.store');
    }
}
