<?php  

class dataKategoriPengeluaran extends CI_Controller
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
		$data['title'] = "Daftar Kategori";
		$data['kategori'] = $this->db->query("SELECT * FROM `kategori` WHERE jenis = 'keluar'")->result_array();

		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataKategoriPengeluaran',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Daftar Kategori";
		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataKategoriPengeluaran',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else{
			$kategori  = $this->input->post('kategori');

			$data = array(
				'kategori'   => $kategori, 
				'jenis'   	 => 'keluar',
			);

			$this->keuanganModel->insert_data($data,'kategori');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Daftar berhasil ditambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataKategoriPengeluaran');

		}
	}


	public function updateData($id)
	{
		$where = array('id_kategori' => $id);
		$data['title'] = "Perbarui Daftar Menu";
		$data['kategori'] = $this->db->query("SELECT * FROM kategori WHERE id_kategori='$id'")->result();
		
		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataKateoriPengeluaran',$data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		}else{
			$id          = $this->input->post('id_kategori');
			$kategori   = $this->input->post('kategori');

			$data = array(
				'kategori'    => $kategori, 
			);

			$where = array(
				'id_kategori' => $id

			);

			$this->keuanganModel->update_data('kategori',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diupdate</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataKategoriPengeluaran');

		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('kategori','kategori','required');
	}

	public function deleteData($id)
	{
		$where = array('id_kategori' => $id);
		$this->keuanganModel->delete_data($where, 'kategori');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataKategoriPengeluaran');
	}

}

?>