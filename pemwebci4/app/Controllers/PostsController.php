<?php

namespace App\Controllers;

use App\Models\PostModel; // Ganti dengan nama model Anda

class PostsController extends BaseController
{
    public function index()
    {
        $postModel = new PostModel(); // Inisialisasi model
        $data['posts'] = $postModel->findAll(); // Ambil semua data post
        return view('app.php', $data); // Tampilkan view 'app' dengan data posts
    }

    public function store()
    {
        $validation = \Config\Services::validation(); // Mendapatkan instance dari class validasi
        
        $validation->setRules([
            'nilai_partisipasi' => 'required|numeric',
            'nilai_tugas' => 'required|numeric',
            'nilai_uts' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors()); // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
        }

        $na = (($this->request->getVar('nilai_partisipasi') * 2) + ($this->request->getVar('nilai_tugas') * 3) + ($this->request->getVar('nilai_uts') * 2) + ($this->request->getVar('nilai_uas') * 3)) / 10;

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

        $postModel = new PostModel(); // Inisialisasi model
        $postModel->save([ // Simpan data ke dalam database
            'nilai_partisipasi' => $this->request->getVar('nilai_partisipasi'),
            'nilai_tugas' => $this->request->getVar('nilai_tugas'),
            'nilai_uts' => $this->request->getVar('nilai_uts'),
            'nilai_uas' => $this->request->getVar('nilai_uas'),
            'na' => $na,
            'nh' => $nh,
        ]);

        return redirect()->to(base_url('/'));
    }
}
