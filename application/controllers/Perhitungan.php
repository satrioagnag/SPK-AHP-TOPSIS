<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->model('Perhitungan_model');
    }

    public function index()
    {

        $data = [
            'page' => "Perhitungan",
            'kriterias' => $this->Perhitungan_model->get_kriteria(),
            'alternatifs' => $this->Perhitungan_model->get_alternatif(),
        ];

        $this->load->view('Perhitungan/perhitungan', $data);
    }

    public function hasil()
    {
        $id_kelas = $this->session->userdata('id_kelas');
        $hasilByKelas = $this->Perhitungan_model->get_hasil($id_kelas);
        $kelas = $this->Perhitungan_model->dataKelas($id_kelas);
        $data = [
            'page' => "Hasil",
            'hasil' => $hasilByKelas,
            'kelas' => $kelas
        ];

        $this->load->view('Perhitungan/hasil', $data);
    }
}
