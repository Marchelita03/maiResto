<?php 

 class Dashboard extends CI_Controller
 {
 	public function __construct(){
 		parent::__construct();

 		if($this->session->userdata('hak_akses') !='1'){
 			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Anda belum login!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 				redirect('login');
 		}
 	}
 	
 	public function index()
 	{
 		$data['title'] = "Dashboard";

 		$data['karyawan'] = $this->db->query("SELECT * FROM karyawan")->num_rows();
        
              $data['uang_masuk'] = $this->db->query("SELECT sum(pendapatan) as pendapatan FROM keuangan where jenis = 'masuk'")->row_array();
              $data['uang_keluar'] = $this->db->query("SELECT sum(pengeluaran) as pengeluaran FROM keuangan where jenis = 'keluar'")->row_array();
              $data['uang_beban'] = $this->db->query("SELECT sum(pengeluaran) as pengeluaran FROM keuangan where jenis = 'beban'")->row_array();

              $data['penjualan'] = $this->db->query("SELECT *, COUNT( * ) AS total, sum(pendapatan) AS pd FROM keuangan WHERE kategori = 'penjualan' GROUP BY tanggal;")->result_array();

 		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('templates_admin/footer');
 	}
 } 
 ?>