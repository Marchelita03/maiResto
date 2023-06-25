<?php  

class dataBeban extends CI_Controller
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
		$data['title'] = "Data Beban";
		$data['beban'] = $this->db->query("SELECT * FROM `keuangan` WHERE jenis = 'beban'")->result_array();
        $data['uang_keluar'] = $this->db->query("SELECT sum(pengeluaran) as pengeluaran FROM keuangan where jenis = 'beban'")->row_array();

		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataBeban',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Beban";
		$data['kategori'] = $this->db->query("SELECT * FROM `kategori` WHERE jenis = 'beban'")->result();
		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataBeban',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else{
			$tanggal   	   = $this->input->post('tanggal');
			$kategori      = $this->input->post('kategori')  ;
			$keterangan    = $this->input->post('keterangan');
  			$pengeluaran   = $this->input->post('pengeluaran');

			$data = array(
				'tanggal'     => $tanggal, 
				'kategori'    => $kategori,   
				'keterangan'  => $keterangan,
		  		'pengeluaran' => $pengeluaran,
				'jenis'   	  => 'beban',
			);

			$this->keuanganModel->insert_data($data,'keuangan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil ditambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataBeban');

		}
	}

	public function updateData($id)
	{
		$data['title'] = "Perbarui Data Beban";
		$where = array('id_keuangan' => $id);
		$data['beban'] = $this->db->query("SELECT * FROM keuangan WHERE id_keuangan = '$id'")->result();	
		$data['kategori'] = $this->db->query("SELECT * FROM `kategori` WHERE jenis = 'beban'")->result();
		
		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataBeban',$data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		}else{
			$id           = $this->input->post('id_keuangan');
			$tanggal      = $this->input->post('tanggal');
			$kategori     = $this->input->post('kategori');  
			$keterangan   = $this->input->post('keterangan');
			$pengeluaran  = $this->input->post('pengeluaran');

			$data = array(
				'tanggal'  	   => $tanggal, 
				'kategori'     => $kategori, 
				'keterangan'   => $keterangan,
  				'pengeluaran'  => $pengeluaran,
			);

			$where = array(
				'id_keuangan' => $id
			);

			$this->keuanganModel->update_data('keuangan',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diupdate</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataBeban');

		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tanggal','tanggal','required');
		$this->form_validation->set_rules('kategori','kategori','required');
		$this->form_validation->set_rules('keterangan','keterangan','required');
		$this->form_validation->set_rules('pengeluaran','pengeluaran','required');
	}

	public function deleteData($id)
	{
		$where = array('id_keuangan' => $id);
		$this->keuanganModel->delete_data($where, 'keuangan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataBeban');
	}
}

?>