<?php  

class dataPenjualan extends CI_Controller
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
		$data['title'] = "Data Penjualan ";
		$data['penjualan'] = $this->db->query('SELECT * FROM penjualan INNER JOIN menu ON penjualan.nama_menu = menu.nama_menu')->result_array();

		//$keyword = $this->input->post('keyword');
		//$data['search'] = $this->keuanganModel->get_keyword($keyword);

		$this->load->view('templates_admin/header',$data);
 		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dataPenjualan',$data);
		$this->load->view('templates_admin/footer');
	}

	public function search()
	{
		/* $this->load->model("keuanganModel"); //This will load Modal into controller
	    $fetch_data = $this->keuanganModel->make_datatables("penjualan",array("id_penjualan", "tanggal","nama_menu"),array("id_penjualan", "tanggal", null, null),"id_penjualan","tanggal","tanggal"); // this will call modal function for fetching data
	    $data = array();
	    foreach($fetch_data as $row) // Loop over the data fetched and store them in array
	    {
	        $sub_array = array();
	        $sub_array[] = $row->id_penjualan;
	        $sub_array[] = $row->tanggal;
	        $sub_array[] = $row->nama_menu;
	        $sub_array[] = '<button type="button" name="update" data-id="'.$row->id_penjualan.'" data-option=0 data-toggle="modal" data-target="#userModal" class="edit_post btn btn-warning btn-xs">Update</button>';
	        $sub_array[] = '<button type="button" name="delete" data-id="'.$row->id_penjualan.'" data-toggle="modal" data-target="#myModal2" id="d_b" class="delete_post btn btn-danger btn-xs">Delete</button>';
	        $data[] = $sub_array;
	    }
	    $output = array(
	        "draw"                    =>     intval($_POST["draw"]),
	        "recordsTotal"          =>      $this->keuanganModel->get_all_data("penjualan"),
	        "recordsFiltered"     =>     $this->keuanganModel->get_filtered_data("penjualan",array("id_penjualan", "tanggal","nama_menu"),array("id_penjualan", "tanggal", null, null),"id_penjualan","tanggal","tanggal"),
	        "data"                    =>     $data
	    );
	    echo json_encode($output);
	    */

	// 	//$keyword = $this->input->post('keyword');
	// 	//$data['searchPenjualan'] = $this->keuanganModel->get_keyword($keyword);
	// 	$keyword = $this->request->getGet('keyword');
	// 	$data['searchPenjualan'] = $this->keuanganModel->get_keyword($keyword);

	// 	//$data = $this->contact->get_keyword(10);

	// 	$this->load->view('templates_admin/header',$data);
 	// 	$this->load->view('templates_admin/sidebar');
	// 	$this->load->view('admin/dataPenjualan',$data);
	// 	$this->load->view('templates_admin/footer');
	}
}

?>