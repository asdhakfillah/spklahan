<?php 
class Model_lahan extends CI_Model{
	public function tampil_data()
	{
		$result = $this->db->get('lahan');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}
}