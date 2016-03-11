<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caja_model extends CI_Model {

	public function inicio_caja($data)
	{
		if($this->db->insert('caja_total',$data))
			return true;
		else		
			return false;
	}

	public function verificar_estado()
	{
		$this->db->select('caja_total_id');
		$this->db->from('caja_total');
		$this->db->where('caja_total_estado',1);

		$query = $this->db->get(); 
			if ($query->num_rows() > 0){
				return $query->result();
			}
			else return FALSE;

	}

	function obtener_caja($id_caja_total){
	    $this->db->select('*');
		$this->db->from('caja_datos');
		$this->db->where('caja_total_id',$id_caja_total);

		$query = $this->db->get(); 
			if ($query->num_rows() > 0){
				return $query->result();
			}
			else return FALSE;
    }

    public function obtener_id()
    {
    	$this->db->select('caja_total_id');
		$this->db->from('caja_total');
		$this->db->where('caja_total_id',$id_caja_total);
    }


   	public function insertar_caja($data){

		if($this->db->insert('caja_datos',$data))
			return true;
		else		
			return false;
	}


}

/* End of file caja_model.php */
/* Location: ./application/models/caja_model.php */