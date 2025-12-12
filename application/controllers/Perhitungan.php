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
        $hasilByKelas = $this->Perhitungan_model->get_hasil();
        $data = [
            'page' => "Hasil",
            'hasil' => $hasilByKelas
        ];

        $this->load->view('Perhitungan/hasil', $data);
    }
}