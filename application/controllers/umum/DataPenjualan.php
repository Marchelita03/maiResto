<?php  

class dataPenjualan extends CI_Controller
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
		$data['title'] = "Data Penjualan ";
		$data['penjualan'] = $this->db->query('SELECT * FROM penjualan INNER JOIN menu ON penjualan.nama_menu = menu.nama_menu')->result_array();

		$this->load->view('templates_umum/header',$data);
 		$this->load->view('templates_umum/sidebar');
		$this->load->view('umum/dataPenjualan',$data);
		$this->load->view('templates_umum/footer');
	}

	public function tambahData()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['title'] = "Tambah Data Penjualan";
		$data['menu'] = $this->keuanganModel->get_data('menu')->result();
		$data['penjualan'] = $this->keuanganModel->get_data('penjualan')->result();

		$this->load->view('templates_umum/header',$data);
 		$this->load->view('templates_umum/sidebar');
		$this->load->view('umum/tambahDataPenjualan',$data);
		$this->load->view('templates_umum/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else{
			$tanggal      = $this->input->post('tanggal');
			$nama_menu    = $this->input->post('nama_menu');
			$jumlah       = $this->input->post('jumlah');
			$harga_lama   = $this->db->query('SELECT harga FROM menu WHERE nama_menu = "'.$nama_menu.'"')->result_array()[0]['harga'];

			$data = array(
				'tanggal'     => $tanggal, 
				'nama_menu'   => $nama_menu,
				'jumlah'      => $jumlah,
				'harga_lama'  => $harga_lama,
			);

			$this->keuanganModel->insert_data($data,'penjualan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil ditambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('umum/dataPenjualan');
		}
	}

	public function updateData($id)
	{
		$where = array('id_penjualan' => $id);
		$data['penjualan'] = $this->db->query("SELECT * FROM penjualan WHERE id_penjualan = '$id'")->result();
		$data['title'] = "Perbarui Data Penjualan";
		$data['menu'] = $this->keuanganModel->get_data('menu')->result();

		$this->load->view('templates_umum/header',$data);
 		$this->load->view('templates_umum/sidebar');
		$this->load->view('umum/updateDataPenjualan',$data);
		$this->load->view('templates_umum/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData($this->input->post('id_penjualan'));
			echo validation_errors();
			die();
		}else{
			$id           = $this->input->post('id_penjualan');
			$tanggal      = $this->input->post('tanggal');
			$nama_menu    = $this->input->post('nama_menu');
			$jumlah  	  = $this->input->post('jumlah');
			$harga_lama   = $this->db->query('SELECT harga FROM menu WHERE nama_menu = "'.$nama_menu.'"')->result_array()[0]['harga'];

			$data = array( 
				'tanggal'     => $tanggal, 
				'nama_menu'   => $nama_menu,
				'jumlah'      => $jumlah,
				'harga_lama'  => $harga_lama,
			);

			$where = array(
				'id_penjualan' => $id
			);

			$this->keuanganModel->update_data('penjualan',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diupdate</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('umum/dataPenjualan');

		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tanggal','tanggal','required');
		$this->form_validation->set_rules('nama_menu','menu','required');
		$this->form_validation->set_rules('jumlah','jumlah','required');
	}

	public function deleteData($id)
	{
		$where = array('id_penjualan' => $id);
		$this->keuanganModel->delete_data($where, 'penjualan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('umum/dataPenjualan');
	}
}

?>