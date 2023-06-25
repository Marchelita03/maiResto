<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') !='2'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Anda belum login!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['uang_masuk'] = $this->db->query("SELECT sum(pendapatan) as pendapatan FROM keuangan where jenis = 'masuk'")->row_array();
        $data['uang_keluar'] = $this->db->query("SELECT sum(pengeluaran) as pengeluaran FROM keuangan where jenis = 'keluar'")->row_array();
        $data['penjualan'] = $this->db->query("SELECT *, COUNT( * ) AS total, sum(pendapatan) AS pd FROM keuangan WHERE kategori = 'penjualan' GROUP BY tanggal;")->result_array();

        $this->load->view('templates_umum/header',$data);
        $this->load->view('templates_umum/sidebar');
        $this->load->view('umum/dashboard',$data);
        $this->load->view('templates_umum/footer');
    }
}
