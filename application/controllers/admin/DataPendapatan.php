<?php  

class dataPendapatan extends CI_Controller
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
		$data['title'] = "Data Pendapatan";
		$data['masuk'] = $this->db->query("SELECT * FROM `keuangan` WHERE jenis = 'masuk'")->result_array();
        $data['uang_masuk'] = $this->db->query("SELECT sum(pendapatan) as pendapatan FROM keuangan where jenis = 'masuk'")->row_array();

		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataPendapatan',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Pendapatan";
		$data['kategori'] = $this->db->query("SELECT * FROM `kategori` WHERE jenis = 'masuk'")->result();
		
		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataPendapatan',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else{
			$tanggal  	 = $this->input->post('tanggal');
			$kategori    = $this->input->post('kategori');
			$keterangan  = $this->input->post('keterangan');
			$pendapatan  = $this->input->post('pendapatan');

			$data = array(
				'tanggal'     => $tanggal, 
				'kategori'    => $kategori,
				'keterangan'  => $keterangan,
				'pendapatan'  => $pendapatan,
				'jenis'   	  => 'masuk',
			);

			$this->keuanganModel->insert_data($data,'keuangan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil ditambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataPendapatan');

		}
	}

	public function updateData($id)
	{
		$data['title'] = "Perbarui Data Pendapatan";
		$where = array('id_keuangan' => $id);
		$data['pendapatan'] = $this->db->query("SELECT * FROM keuangan WHERE id_keuangan = '$id'")->result();
		$data['kategori'] = $this->db->query("SELECT * FROM `kategori` WHERE jenis = 'masuk'")->result();
		
		

		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataPendapatan',$data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		}else{
			$id         = $this->input->post('id_keuangan');
			$tanggal    = $this->input->post('tanggal');
			$kategori   = $this->input->post('kategori');
			$keterangan = $this->input->post('keterangan');
			$pendapatan = $this->input->post('pendapatan');

			$data = array(
				'tanggal'    => $tanggal, 
				'kategori'   => $kategori,
				'keterangan' => $keterangan,
				'pendapatan' => $pendapatan,
			);

			$where = array(
				'id_keuangan' => $id
			);

			$this->keuanganModel->update_data('keuangan',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diupdate</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataPendapatan');

		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('tanggal','tanggal','required');
		$this->form_validation->set_rules('kategori','kategori','required');
		$this->form_validation->set_rules('keterangan','keterangan','required');
		$this->form_validation->set_rules('pendapatan','pendapatan','required');
	}

	public function deleteData($id)
	{
		$where = array('id_keuangan' => $id);
		$this->keuanganModel->delete_data($where, 'keuangan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataPendapatan');
	}
}

?>