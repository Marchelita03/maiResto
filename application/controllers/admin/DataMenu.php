<?php  

class dataMenu extends CI_Controller
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
		$data['title'] = "Daftar Menu";
		$data['menu'] = $this->keuanganModel->get_data('menu')->result_array();

		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataMenu',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Daftar Menu";
		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataMenu',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else{
			$nama_menu  = $this->input->post('nama_menu');
			$harga      = $this->input->post('harga');

			$data = array(
				'nama_menu'   => $nama_menu, 
				'harga'       => $harga,
			);

			$this->keuanganModel->insert_data($data,'menu');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Daftar berhasil ditambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataMenu');

		}
	}


	public function updateData($id)
	{
		$where = array('id_menu' => $id);
		$data['title'] = "Perbarui Daftar Menu";
		$data['menu'] = $this->db->query("SELECT * FROM menu WHERE id_menu='$id'")->result();
		
		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataMenu',$data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		}else{
			$id          = $this->input->post('id_menu');
			$nama_menu   = $this->input->post('nama_menu');
			$harga       = $this->input->post('harga');

			$data = array(
				'nama_menu'    => $nama_menu, 
				'harga'        => $harga,
			);

			$where = array(
				'id_menu' => $id
			);

			$this->keuanganModel->update_data('menu',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diupdate</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataMenu');

		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_menu','menu','required');
		$this->form_validation->set_rules('harga','harga','required');
	}

	public function deleteData($id)
	{
		$where = array('id_menu' => $id);
		$this->keuanganModel->delete_data($where, 'menu');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataMenu');
	}

}

?>