<?php  

class dataMenu extends CI_Controller
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
		$data['title'] = "Daftar Menu";

		$data['menu'] = $this->keuanganModel->get_data('menu')->result_array();

		$this->load->view('templates_umum/header',$data);
 		$this->load->view('templates_umum/sidebar');
		$this->load->view('umum/dataMenu',$data);
		$this->load->view('templates_umum/footer');
	}
}

?>