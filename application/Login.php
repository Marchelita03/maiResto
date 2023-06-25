<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
 	{
 		$this->_rules();

 		if($this->form_validation->run()==FALSE) {
 			$data['title'] = "Form Login";
        	$this->load->view('templates_umum/header',$data);
			$this->load->view('login');
 		}else{
 			$username = $this->input->post('username');
 			$password = $this->input->post('password');

 			$cek = $this->keuanganModel->cek_login($username,$password);

 			if($cek == FALSE)
 			{
 				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Username atau Password salah!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
 				redirect('login');
 			}else{
 				$this->session->set_userdata('hak_akses',$cek->hak_akses);
				
 				switch ($cek->hak_akses) {
 					case 1 : redirect('admin/dashboard');
 						break;
 					
 					default:
 						break;
 				}
 			}
 		}
 	}
 	public function _rules()
 	{
 		$this->form_validation->set_rules('username','username','required');
 		$this->form_validation->set_rules('password','password','required');
 	}

 	public function logout()
 	{
 		$this->session->sess_destroy();
 		redirect('login');
 	}
}
?>