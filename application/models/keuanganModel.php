<?php  

class KeuanganModel extends CI_Model
{
	
	public function get_data($table){
		return $this->db->get($table);
	}

	public function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function update_data($table,$data,$where){
		$this->db->update($table,$data,$where);
	}
	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	// public function get_keyword($keyword = null){
	// 	$table = $this->db->table('penjualan');		
	// 	if($keyword !='') {
	// 		$this->db->select('*');
			
	// 		$this->db->like('jumlah',$keyword);
	// 		$this->db->or_like('nama_menu',$keyword);
	// 		return $this->db->get()->result();
	// 	}
		
	// }

	public function cek_login()
	{
		$username   = set_value('username');
		$password   = set_value('password');

		$result     =$this->db->where('username',$username)
							  ->where('password',md5($password))
							  ->limit(1)
							  ->get('hak_akses');
		if($result->num_rows()>0) {
			return $result->row();
		}else{
			return FALSE;
		}
	}
}

?>