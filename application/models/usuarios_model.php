<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	protected $table;
	protected $id;
	
	/*
		Constructor del modelo, aqui establecemos
		que tabla utilizamos y cual es su llave primaria.
	*/
	function __construct() {
		parent::__construct();
		$this->table = 'usuarios';
		$this->id = 'us_id';
	}

	/*
		Con esta funcion comprobamos que exista el
		usuario en la base de datos, si es asi retornamos
		el contenido del registro, de lo contrario se 
		retorna FALSE.
	*/
	function get($email='', $password='') {
		return $this->db->get_where(
			$this->table, array(
				'us_email' => $email,
				'us_password' => $password
			)
		)->row();
	}

	public function insertar_reservacion($data){

		if($this->db->insert('reservaciones',$data))
			return true;
		else
			return false;
	}

	public function insertar_usuario($data){

		if($this->db->insert('usuarios',$data))
			return true;
		else
			return false;
	}

	public function insertar_mascota($data){

		if($this->db->insert('mascotas',$data))
			return true;
		else
			return false;
	}

	function obtener_usuario($id){
    	$this->db->where('us_id',$id);
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }

    function obtener_mascota($id){
    	$this->db->where('mas_id_usuario',$id);
        $query = $this->db->get('mascotas');
        return $query->result_array();
    }

    function actualizar_usuario($data){
	  	$datos = $this->session->userdata('logged_user');
	    $id=$datos->us_id;        
	    $this->db->where('us_id', $id);
	    $this->db->update('usuarios', $data);                      
  	}
	
	public function ultima_reservacion()
	{
		$this->db->select('r.res_id');
		$this->db->from('reservaciones r');
		$this->db->order_by('r.res_id', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else return FALSE;
	}

	public function add_servicio($id_res, $id_serv, $id_mas)
	{
		$data['res_serv_id_res'] = $id_res;
		$data['res_serv_id_serv'] = $id_serv;
		$data['res_serv_id_mas'] = $id_mas;
		$data['res_serv_cantidad'] = 1;
		
		$this->db->insert('reservaciones-servicios', $data);
	}

	public function res_mascota($id)
	{	
		$num=0;
		$this->db->select('mas_id, mas_nombre');
		$this->db->from('mascotas');
		$this->db->where('mas_id',$id[0]);
		foreach ($id as $key => $value) {
			$this->db->or_where('mas_id',$id[$num]);
			$num++;
		}

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else return FALSE;
	}

	public function mas_id_usuario($id)
	{
		$this->db->select('mas_id');
		$this->db->from('mascotas');
		$this->db->where('mas_id_usuario', $id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else return FALSE;
	}

	public function insertar_mascotas_reservaciones($data)
    {
    	if($this->db->insert('mascotas_reservaciones',$data))
			return true;
		else		
			return false;
    }

    public function ultima_mascota()
    {
    	$this->db->select('m.mas_id');
		$this->db->from('mascotas m');
		$this->db->order_by('m.mas_id', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else return FALSE;
    }
}

/* End of file usuarios_model.php */
/* Location: ./application/models/usuarios_model.php */

