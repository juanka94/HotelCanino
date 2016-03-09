<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administradores_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->table = 'administradores';
		$this->id = 'admin_id';
		
	}

	//funciones de reservaciones

	public function res_entrantes()
	{
		$this->db->select('r.res_id, r.res_fecha_in, r.res_fecha_out, u.us_nombre');
		$this->db->from('reservaciones r');
		$this->db->join('usuarios u','u.us_id = r.res_id_usuario');
		$this->db->where('r.res_status',0);
		$this->db->where('r.res_no_habitacion',0);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else return FALSE;
	}

	public function res_usuario($id)
	{
		$this->db->select('us_id, us_nombre, us_ap_paterno, us_ap_materno, us_email, us_tel_casa, us_tel_cel, us_dom_calle, us_dom_localidad, us_dom_municipio, us_dom_estado');
		$this->db->from('usuarios');
		$this->db->where('us_id',$id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else return FALSE;
	}
//NUEVO INICIO
	public function res_id_mascota($id)
	{
		$this->db->select('mas_res_id_mas');
		$this->db->from('mascotas_reservaciones');
		$this->db->where('mas_res_id_res', $id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else return FALSE;
	}

	public function res_mascota($id)
	{	
		$num=0;
		$this->db->select('*');
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
//NUEVO FIN
	public function reservacion($id)
	{
		$query = $this->db->get_where('reservaciones r',array('res_id' => $id));

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function lugar_disponible($fecha_in,$fecha_out)
	{
		$this->db->select('r.res_no_habitacion');
		$this->db->from('reservaciones r');
		$this->db->where('r.res_status',1);
		$this->db->where('r.res_fecha_out >=',$fecha_in);
		$this->db->where('r.res_fecha_in <=',$fecha_out);
		$this->db->where('r.res_no_habitacion !=',0);

		$query = $this->db->get();

		if ($query->num_rows() > 0)
	    {
			return $query->result();
		}
		return FALSE;
	}

	public function activar($data)
	{
		$this->db->where('res_id', $data['res_id']);
		$this->db->update('reservaciones', $data);
	}

	public function mostrar_ser_dom_sen($id)
	{
		$this->db->select('res_serv_id_res');
		$this->db->from('reservaciones-servicios');
		$this->db->where('res_serv_id_res', $id);
		$this->db->where("res_serv_id_serv " ,1);
		//agregar todos los id del servicio a domoicilio posibles quitar el where de arriba
		//$where = "res_serv_id_serv = 'id del servicio' OR "res_serv_id_serv = 'id del servicio' OR "res_serv_id_serv = 'id del servicio'";
		//$this->db->where($where);

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return FALSE;
	}

	public function mostrar_ser_redondo($id)
	{
		$this->db->select('res_serv_id_res');
		$this->db->from('reservaciones-servicios');
		$this->db->where('res_serv_id_res', $id);
		$this->db->where("res_serv_id_serv " ,6);
		//agregar todos los id del servicio a domoicilio posibles quitar el where de arriba
		//$where = "res_serv_id_serv = 'id del servicio' OR "res_serv_id_serv = 'id del servicio' OR "res_serv_id_serv = 'id del servicio'";
		//$this->db->where($where);

		$query = $this->db->get();

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		return FALSE;
	}

	//Funciones de habitación

	public function lugares($fecha)
	{
		$this->db->select('r.res_no_habitacion');
		$this->db->from('reservaciones r');
		$this->db->where('r.res_status',1);
		//$this->db->where('r.res_fecha_out >=',$fecha);  //Preguntar como proceder cuando no vienen por un perro el dia acordado.
		$this->db->where('r.res_no_habitacion !=',0);

		$query = $this->db->get();

		if ($query->num_rows() > 0)
	    {
			return $query->result();
		}
		return FALSE;
	}
	
	public function habitacion($id)
	{
		$query = $this->db->get_where('reservaciones r',array('res_no_habitacion' => $id, 'res_status' => '1'));

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function get_servicios($id_res, $id_mas)
	{
		$this->db->select('rs.res_serv_id_serv,rs.res_serv_cantidad,s.serv_id,s.serv_nombre,s.serv_precio,s.serv_descripcion');
		$this->db->from('reservaciones-servicios rs');
		$this->db->join('servicios s','rs.res_serv_id_serv = s.serv_id');
		$this->db->where('rs.res_serv_id_res',$id_res);
		$this->db->where('rs.res_serv_id_mas',$id_mas);

		$query = $this->db->get(); 

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function buscar_servicios($id_res, $id_mas)
	{
		$this->db->select('rp.res_serv_id_serv');
		$this->db->from('reservaciones-servicios rp');
		$this->db->where('rp.res_serv_id_res',$id_res);
		$this->db->where('rp.res_serv_id_mas',$id_mas);

		$query = $this->db->get();

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function buscar_servicios2($name, $query)
	{
		$this->db->from('servicios p');
		$this->db->where_not_in('p.serv_id', $query);
		$this->db->like('p.serv_nombre', $name);
        
		$query = $this->db->get(); 

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function agregar_servicio($data)
	{
		$this->db->where('res_serv_id_res', $data['res_serv_id_res']);
		$this->db->where('res_serv_id_serv', $data['res_serv_id_serv']);
		$this->db->where('res_serv_id_mas', $data['res_serv_id_mas']);
		$this->db->update('reservaciones-servicios',$data);
	}

	public function quitar_servicio($data)
	{
		$this->db->where('res_serv_id_res', $data['res_serv_id_res']);
		$this->db->where('res_serv_id_serv', $data['res_serv_id_serv']);
		$this->db->where('res_serv_id_mas', $data['res_serv_id_mas']);
		$this->db->update('reservaciones-servicios',$data);
	}

	public function borrar_servicio($data)
	{
		$this->db->delete('reservaciones-servicios',$data);
		$this->db->limit(1);
	}

	public function get_productos($id_res, $id_mas)
	{
		$this->db->select('rp.res_prod_id_prod, rp.res_prod_cantidad, p.prod_id, p.prod_nombre, p.prod_precio, p.prod_descripcion, p.prod_cantidad');
		$this->db->from('reservaciones-productos rp');
		$this->db->join('productos p','rp.res_prod_id_prod = p.prod_id');
		$this->db->where('rp.res_prod_id_res',$id_res);
		$this->db->where('rp.res_prod_id_mas',$id_mas);

		$query = $this->db->get(); 

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function buscar_productos($id_res, $id_mas)
	{
		$this->db->select('rp.res_prod_id_prod');
		$this->db->from('reservaciones-productos rp');
		$this->db->where('rp.res_prod_id_res',$id_res);
		$this->db->where('rp.res_prod_id_mas',$id_mas);

		$query = $this->db->get();

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function buscar_productos2($name, $query)
	{
		$this->db->from('productos p');
		$this->db->where_not_in('p.prod_id', $query);
		$this->db->like('p.prod_nombre', $name);
        
		$query = $this->db->get(); 

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function agregar_producto($data, $prod_cantidad)
	{
		$this->db->where('res_prod_id_res', $data['res_prod_id_res']);
		$this->db->where('res_prod_id_prod', $data['res_prod_id_prod']);
		$this->db->where('res_prod_id_mas', $data['res_prod_id_mas']);
		$this->db->update('reservaciones-productos',$data);

		$this->db->where('prod_id', $data['res_prod_id_prod']);
		$this->db->update('productos',$prod_cantidad);
	}

	public function quitar_producto($data, $prod_cantidad)
	{
		$this->db->where('res_prod_id_res', $data['res_prod_id_res']);
		$this->db->where('res_prod_id_prod', $data['res_prod_id_prod']);
		$this->db->where('res_prod_id_mas', $data['res_prod_id_mas']);
		$this->db->update('reservaciones-productos',$data);

		$this->db->where('prod_id', $data['res_prod_id_prod']);
		$this->db->update('productos',$prod_cantidad);
	}

	public function borrar_producto($data)
	{
		$this->db->delete('reservaciones-productos',$data);
		$this->db->limit(1);
	}

	public function get_paquetes($id_res, $id_mas)
	{
		$this->db->select('rp.res_paque_id_paque, rp.res_paque_cantidad, p.paque_id, p.paque_nombre, p.paque_precio, p.paque_descripcion');
		$this->db->from('reservaciones-paquetes rp');
		$this->db->join('paquetes p','rp.res_paque_id_paque = p.paque_id');
		$this->db->where('rp.res_paque_id_res',$id_res);
		$this->db->where('rp.res_paque_id_mas',$id_mas);

		$query = $this->db->get(); 

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function buscar_paquetes($id_res, $id_mas)
	{
		$this->db->select('rp.res_paque_id_paque');
		$this->db->from('reservaciones-paquetes rp');
		$this->db->where('rp.res_paque_id_res',$id_res);
		$this->db->where('rp.res_paque_id_mas',$id_mas);

		$query = $this->db->get();

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function buscar_paquetes2($name, $query)
	{
		$this->db->from('paquetes p');
		$this->db->where_not_in('paque_id', $query);
		$this->db->like('paque_nombre', $name);
        
		$query = $this->db->get(); 

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function agregar_paquete($data)
	{
		$this->db->where('res_paque_id_res', $data['res_paque_id_res']);
		$this->db->where('res_paque_id_paque', $data['res_paque_id_paque']);
		$this->db->where('res_paque_id_mas', $data['res_paque_id_mas']);
		$this->db->update('reservaciones-paquetes',$data);
	}

	public function quitar_paquete($data)
	{
		$this->db->where('res_paque_id_res', $data['res_paque_id_res']);
		$this->db->where('res_paque_id_paque', $data['res_paque_id_paque']);
		$this->db->where('res_paque_id_mas', $data['res_paque_id_mas']);
		$this->db->update('reservaciones-paquetes',$data);
	}

	public function borrar_paquete($data)
	{
		$this->db->delete('reservaciones-paquetes',$data);
		$this->db->limit(1);
	}

	public function agregar_producto_reservacion($data)
	{
		$this->db->insert('reservaciones-productos', $data);
	}

	public function agregar_servicio_reservacion($data)
	{
		$this->db->insert('reservaciones-servicios', $data);
	}

	public function agregar_paquete_reservacion($data)
	{
		$this->db->insert('reservaciones-paquetes', $data);
	}

	public function producto_cantidad_precio($id)
	{
		$this->db->select('rp.res_prod_id_prod, rp.res_prod_cantidad, p.prod_precio, p.prod_nombre');
		$this->db->from('reservaciones-productos rp');
		$this->db->join('productos p', 'rp.res_prod_id_prod = p.prod_id');
		$this->db->where('rp.res_prod_id_res',$id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function servicio_cantidad_precio($id)
	{
		$this->db->select('rp.res_serv_id_serv, rp.res_serv_cantidad, s.serv_precio, s.serv_nombre');
		$this->db->from('reservaciones-servicios rp');
		$this->db->join('servicios s', 'rp.res_serv_id_serv = s.serv_id');
		$this->db->where('rp.res_serv_id_res',$id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function paquete_cantidad_precio($id)
	{
		$this->db->select('rp.res_paque_id_paque, rp.res_paque_cantidad, p.paque_precio, p.paque_nombre');
		$this->db->from('reservaciones-paquetes rp');
		$this->db->join('paquetes p', 'rp.res_paque_id_paque = p.paque_id');
		$this->db->where('rp.res_paque_id_res',$id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	//funciones de usuarios

	public function get_usuarios()
	{
		$this->db->select('u.us_id, u.us_nombre, u.us_ap_paterno');
		$this->db->from('usuarios u');

		$query = $this->db->get(); 

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}
	//NUEVO
	public function ver_usuario($id)
	{
		$query = $this->db->get_where('usuarios', array('us_id' => $id));

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function us_mascota($id)
	{
		$query = $this->db->get_where('mascotas', array('mas_id_usuario' => $id));

		if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
	}

	public function upgrade($id)
	{
		$tipo = array('us_tipo' => 1);

		$this->db->where('us_id', $id);
		$this->db->update('usuarios', $tipo);
	}

	public function update_usuario($id, $data)
	{
		$this->db->where('us_id', $id);
		$this->db->update('usuarios', $data);
	}

	public function eliminar_usuario($id)
	{
		$this->db->delete('usuarios', $id);
		$this->db->limit(1);
	}

	public function usuarios($nombre)
    {
    	$this->db->select('*');
    	$this->db->from('usuarios u');
    	$this->db->like('u.us_nombre', $nombre);
    	$this->db->or_like('u.us_ap_paterno',$nombre);
    	$this->db->or_like('u.us_ap_materno',$nombre);

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
    }

    public function last_user()
    {
    	$this->db->select('us_id');
    	$this->db->from('usuarios');
    	$this->db->order_by('us_id','desc');
    	$this->db->limit(1);

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
    }

    public function last_mascota()
    {
    	$this->db->select('mas_id');
    	$this->db->from('mascotas');
    	$this->db->order_by('mas_id','desc');
    	$this->db->limit(1);

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
    }

    public function last_reservacion()
    {
    	$this->db->select('res_id');
    	$this->db->from('reservaciones');
    	$this->db->order_by('res_id','desc');
    	$this->db->limit(1);

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
    }

    public function insertar_reservacion($data)
    {
    	if($this->db->insert('reservaciones',$data))
			return true;
		else		
			return false;
    }

    public function insertar_mascotas_reservaciones($data)
    {
    	if($this->db->insert('mascotas_reservaciones',$data))
			return true;
		else		
			return false;
    }
	//NUEVO
	//funciones inventrio

    public function productos($nombre)
    {
    	$this->db->select('*');
    	$this->db->from('productos p');
    	$this->db->like('p.prod_nombre', $nombre);

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
    }

    public function servicios($nombre)
    {
    	$this->db->select('*');
    	$this->db->from('servicios s');
    	$this->db->like('s.serv_nombre', $nombre);

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
    }

    public function paquetes($nombre)
    {
    	$this->db->select('*');
    	$this->db->from('paquetes p');
    	$this->db->like('p.paque_nombre', $nombre);

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
    }

    public function cantidad_producto($data)
    {
    	$this->db->where('prod_id', $data['prod_id']);
    	$this->db->update('productos', $data);
    }

    public function producto($id)
    {
    	$this->db->select('*');
    	$this->db->from('productos p');
    	$this->db->like('p.prod_id', $id);

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
    }

    public function modificar_producto($id, $data)
    {
    	$this->db->where('prod_id', $id);
    	$this->db->update('productos', $data);
    }

    public function eliminar_producto($id)
    {
    	$this->db->delete('productos', $id);
    	$this->db->limit(1);
    }

    public function servicio($id)
    {
    	$this->db->select('*');
    	$this->db->from('servicios s');
    	$this->db->like('s.serv_id', $id);

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
    }

    public function modificar_servicio($id, $data)
    {
    	$this->db->where('serv_id', $id);
    	$this->db->update('servicios', $data);
    }

    public function eliminar_servicio($id)
    {
    	$this->db->delete('servicios', $id);
    	$this->db->limit(1);
    }

    public function paquete($id)
    {
    	$this->db->select('*');
    	$this->db->from('paquetes p');
    	$this->db->like('p.paque_id', $id);

    	$query = $this->db->get();

    	if ($query->num_rows() > 0) 
		{
			return $query->result();
		}
		else return FALSE;
    }

    public function modificar_paquete($id, $data)
    {
    	$this->db->where('paque_id', $id);
    	$this->db->update('paquetes', $data);
    }

    public function eliminar_paquete($id)
    {
    	$this->db->delete('paquetes', $id);
    	$this->db->limit(1);
    }

    public function add_producto($data)
    {
    	$this->db->insert('productos', $data);
    }

    public function add_servicio($data)
    {
    	$this->db->insert('servicios', $data);
    }

    public function add_paquete($data)
    {
    	$this->db->insert('paquetes', $data);
    }

      public function add_administrador($data){

		if($this->db->insert('administradores',$data))
			return true;
		else		
			return false;
	}

	public function insertar_cliente($data){

		if($this->db->insert('usuarios',$data))
			return true;
		else		
			return false;
	}

	public function insertar_mascota($data)
	{
		if($this->db->insert('mascotas',$data))
			return true;
		else		
			return false;
	}

	function get($nombre='', $password='') {
		return $this->db->get_where(
			$this->table, array(
				'admin_nombre' => $nombre,
				'admin_password' => $password
			)
		)->row();
	}

	function obtener_user_admin($id){
    	$this->db->where('admin_id',$id);
        $query = $this->db->get('administradores');
        return $query->result_array();
    }

    function actualizar_user_admin($data){
  	$datos = $this->session->userdata('logged_user');
    $id=$datos->admin_id;        
    $this->db->where('admin_id', $id);
    $this->db->update('administradores', $data);   
	}

}

/* End of file administradores.php */
/* Location: ./application/models/administradores.php */