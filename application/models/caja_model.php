<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caja_model extends CI_Model {

	function obtener_caja(){
	    $this->db->select('*');
		$this->db->from('caja');

		$query = $this->db->get(); 
			if ($query->num_rows() > 0){
				return $query->result();
			}
			else return FALSE;
    }

   public function insertar_caja($data){

		if($this->db->insert('caja',$data))
			return true;
		else		
			return false;
	}


}

/* End of file caja_model.php */
/* Location: ./application/models/caja_model.php */