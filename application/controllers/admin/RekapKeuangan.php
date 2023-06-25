<?php 

class rekapKeuangan extends CI_Controller
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
		$data['title'] = "Rekap Data Keuangan"; 
        $data['rekap'] = $this->db->query("SELECT * FROM `keuangan`")->result_array();
        $data['uang_masuk'] = $this->db->query("SELECT sum(pendapatan) as pendapatan FROM keuangan where jenis = 'masuk'")->row_array();
        $data['uang_keluar'] = $this->db->query("SELECT sum(pengeluaran) as pengeluaran FROM keuangan where jenis = 'keluar'")->row_array();

		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/rekapKeuangan',$data);
		$this->load->view('templates_admin/footer');
	}

    public function search()
    {
        $data['title'] = 'Rekap Data Keuangan';
        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        
        $data['rekap'] = $this->db->query("SELECT * FROM keuangan WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun'")->result_array();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/search',$data);
        $this->load->view('templates_admin/footer');
    }

    public function cetak()
    {
        $data['title'] = 'Cetak Rekapan';
        $type = $this->input->get('p');
        if ((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        
        $data['rekap'] = $this->db->query("SELECT * FROM keuangan WHERE month(tanggal) = '$bulan' AND year(tanggal) = '$tahun'")->result_array();

        $data['pendapatan'] = $this->db->query("SELECT *, COUNT( * ) AS total, sum(pendapatan) as pd FROM keuangan WHERE jenis = 'masuk' AND month(tanggal) = '$bulan' AND year(tanggal) = '$tahun' GROUP BY kategori;")->result_array();
        
        $data['pengeluaran'] = $this->db->query("SELECT *, COUNT( * ) AS total, sum(pengeluaran) as pg FROM keuangan WHERE jenis = 'keluar' AND month(tanggal) = '$bulan' AND year(tanggal) = '$tahun' GROUP BY kategori;")->result_array();
        
        $data['beban'] = $this->db->query("SELECT *, COUNT( * ) AS total, sum(pengeluaran) as b FROM keuangan WHERE jenis = 'beban' AND month(tanggal) = '$bulan' AND year(tanggal) = '$tahun' GROUP BY kategori;")->result_array();
            
            //dari gbt
            //$this->load->helper('bulan');
            $this->load->view('templates_admin/header',$data);
            $this->load->view('admin/cetak', $data);
    }

    public function cetakKeseluruhan()
    {
        $data['title'] = 'Cetak Rekapan';
        $type = $this->input->get('p');
        
        $data['pendapatan'] = $this->db->query("SELECT *, COUNT( * ) AS total, sum(pendapatan) as pd FROM keuangan WHERE jenis = 'masuk' GROUP BY kategori;")->result_array();
        
        $data['pengeluaran'] = $this->db->query("SELECT *, COUNT( * ) AS total, sum(pengeluaran) as pg FROM keuangan WHERE jenis = 'keluar' GROUP BY kategori;")->result_array();
        
        $data['beban'] = $this->db->query("SELECT *, COUNT( * ) AS total, sum(pengeluaran) as b FROM keuangan WHERE jenis = 'beban' GROUP BY kategori;")->result_array();

            
        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetakKeseluruhan', $data);
    }
}
?>