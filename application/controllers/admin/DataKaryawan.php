<?php  

class dataKaryawan extends CI_Controller
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
		$data['title'] = "Data Karyawan";
		$data['karyawan'] = $this->keuanganModel->get_data('karyawan')->result_array();

		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataKaryawan',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
		$data['title'] = "Tambah Data Karyawan";
		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/tambahDataKaryawan',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambahData();
		}else{
			$nama_karyawan  = $this->input->post('nama_karyawan');
			$tgl_lahir      = $this->input->post('tgl_lahir');
			$alamat   		= $this->input->post('alamat');
			$jabatan        = $this->input->post('jabatan');
			//$hak_akses      = $this->input->post('hak_akses');

			$data = array(
				'nama_karyawan'   => $nama_karyawan, 
				'tgl_lahir'       => $tgl_lahir,
				'alamat'  		  => $alamat,
				'jabatan'         => $jabatan,
				//'hak_akses'       => $hak_akses
			);

			$this->keuanganModel->insert_data($data,'karyawan');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil ditambahkan</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataKaryawan');

		}
	}


	public function updateData($id)
	{
		$where = array('id_karyawan' => $id);
		$data['title'] = "Perbarui Data Karyawan";
		$data['karyawan'] = $this->db->query("SELECT * FROM karyawan WHERE id_karyawan='$id'")->result();
		
		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/updateDataKaryawan',$data);
		$this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->updateData();
		}else{
			$id              = $this->input->post('id_karyawan');
			$nama_karyawan   = $this->input->post('nama_karyawan');
			$tgl_lahir       = $this->input->post('tgl_lahir');
			$alamat 		 = $this->input->post('alamat');
			$jabatan         = $this->input->post('jabatan');
			//$hak_akses       = $this->input->post('hak_akses');

			$data = array(
				'nama_karyawan'    => $nama_karyawan, 
				'tgl_lahir'        => $tgl_lahir,
				'alamat'  		   => $alamat,
				'jabatan'          => $jabatan,
				//'hak_akses'        => $hak_akses
			);

			$where = array(
				'id_karyawan' => $id
			);

			$this->keuanganModel->update_data('karyawan',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Data berhasil diupdate</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataKaryawan');

		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_karyawan','nama','required');
		$this->form_validation->set_rules('tgl_lahir','tanggal lahir','required');
		$this->form_validation->set_rules('alamat','alamat','required');
		$this->form_validation->set_rules('jabatan','jabatan','required');
	}

	public function deleteData($id)
	{
		$where = array('id_karyawan' => $id);
		$this->keuanganModel->delete_data($where, 'karyawan');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Data berhasil dihapus</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"&times;></span></button></div>');
			redirect('admin/dataKaryawan');
	}

}

?>