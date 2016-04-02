<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/layers/inicio');
		$this->load->view('usuario/layers/footer');	
	}

	public function login() {

		$data = array();
		$this->form_validation->set_rules('email', 'Correo', 'required');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');
		$this->form_validation->set_message('required', '<div class="alert alert-danger">El campo %s es requerido.</div>');
		
		if(!empty($_POST)) {
			
			if ($this->form_validation->run() == TRUE) {
				
				$logged_user = $this->usuarios_model->get($_POST['email'], $_POST['password']);

				if($logged_user) {
					$this->session->set_userdata('logged_user', $logged_user);
					redirect('usuarios/reservar');
				} else {
					redirect('usuarios/login');
				}
			}
		}
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/usuarios/login');
		$this->load->view('usuario/layers/footer');	
	}

	public function logout() {
		$this->session->unset_userdata('logged_user');
		$this->session->sess_destroy();
		redirect('usuarios/index');
	}

	public function reservar()
	{
		if(!$this->session->userdata('logged_user')){
			redirect('usuarios/login');
		}else
		{
			$datos = $this->session->userdata('logged_user');
			//servicios redondos
			switch ($datos->us_dom_estado) {
				case 'Colima':
				
				switch ($datos->us_dom_municipio) {
					case 'Colima':
						
						switch ($datos->us_dom_localidad) {
							//agregar solo en casos especiales de localidades alejadas
							/*case 'value':
								$data['id_serv_redondo'] = num;
								$precio_serv_dom_redondo =num;
								break;*/
							
							//todos los demas van a caer aqui
							default:
								$data['id_serv_redondo'] = 6;
								$data['precio_serv_dom_redondo'] = 80;
								break;
						}

						break;

					case 'Villa de Alvarez':
						
						switch ($datos->us_dom_localidad) {
							//agregar solo en casos especiales de localidades alejadas
							/*case 'value':
								$data['id_serv_redondo'] = num;
								$precio_serv_dom_redondo =num;
								break;*/
							
							//todos los demas van a caer aqui
							default:
								$data['id_serv_redondo'] = 6;
								$data['precio_serv_dom_redondo'] = 80;
								break;
						}

						break;

					case 'Coquimatlan':
						
						switch ($datos->us_dom_localidad) {
							//agregar solo en casos especiales de localidades alejadas
							/*case 'value':
								$data['id_serv_redondo'] = num;
								$data['precio_serv_dom_redondo'] =num;
								break;*/
							
							//todos los demas van a caer aqui
							default:
								$data['id_serv_redondo'] = 6;
								$data['precio_serv_dom_redondo'] = 100;
								break;
						}

						break;

					case 'Tecoman':
						
						switch ($datos->us_dom_localidad) {
							//agregar solo en casos especiales de localidades alejadas
							/*case 'value':
								$data['id_serv_redondo'] = num;
								$data['precio_serv_dom_redondo'] =num;
								break;*/
							
							//todos los demas van a caer aqui
							default:
								$data['id_serv_redondo'] = 6;
								$data['precio_serv_dom_redondo'] = 120;
								break;
						}

						break;

					//si llegaran a mas municipios agregar mas
					/*case 'value':
						# code...
						break;*/
					
					default:
						$data['precio_serv_dom_redondo'] = -1;
						break;
				}

				break;

				//agregar uno por estado
				/*case 'Value':
					# code...
					break;
				*/
				default:
					$data['precio_serv_dom_redondo'] = -1;
					break;
			}

			//servicios sencillos
			switch ($datos->us_dom_estado) {
				case 'Colima':
				
				switch ($datos->us_dom_municipio) {
					case 'Colima':
						
						switch ($datos->us_dom_localidad) {
							//agregar solo en casos especiales de localidades alejadas
							/*case 'value':
								$data['id_serv_sencillo'] = num;
								$precio_serv_dom_sencillo =num;
								break;*/
							
							//todos los demas van a caer aqui
							default:
								$data['id_serv_sencillo'] = 6;
								$data['precio_serv_dom_sencillo'] = 40;
								break;
						}

						break;

					case 'Villa de Alvarez':
						
						switch ($datos->us_dom_localidad) {
							//agregar solo en casos especiales de localidades alejadas
							/*case 'value':
								$data['id_serv_sencillo'] = num;
								$precio_serv_dom_sencillo =num;
								break;*/
							
							//todos los demas van a caer aqui
							default:
								$data['id_serv_sencillo'] = 6;
								$data['precio_serv_dom_sencillo'] = 40;
								break;
						}

						break;

					case 'Coquimatlan':
						
						switch ($datos->us_dom_localidad) {
							//agregar solo en casos especiales de localidades alejadas
							/*case 'value':
								$data['id_serv_sencillo'] = num;
								$data['precio_serv_dom_sencillo'] =num;
								break;*/
							
							//todos los demas van a caer aqui
							default:
								$data['id_serv_sencillo'] = 6;
								$data['precio_serv_dom_sencillo'] = 50;
								break;
						}

						break;

					case 'Tecoman':
						
						switch ($datos->us_dom_localidad) {
							//agregar solo en casos especiales de localidades alejadas
							/*case 'value':
								$data['id_serv_sencillo'] = num;
								$data['precio_serv_dom_sencillo'] =num;
								break;*/
							
							//todos los demas van a caer aqui
							default:
								$data['id_serv_sencillo'] = 6;
								$data['precio_serv_dom_sencillo'] = 60;
								break;
						}

						break;

					//si llegaran a mas municipios agregar mas
					/*case 'value':
						# code...
						break;*/
					
					default:
						$data['precio_serv_dom_sencillo'] = -1;
						break;
				}

				break;

				//agregar uno por estado
				/*case 'Value':
					# code...
					break;
				*/
				default:
					$data['precio_serv_dom_sencillo'] = -1;
					break;
			}

			$us_id = $datos->us_id;

			$query = $this->usuarios_model->mas_id_usuario($us_id);

			$id_mascota = array();

			foreach ($query as $key => $value) {
				$id_mascota[] = $value->mas_id;
			}

			$query = $this->usuarios_model->res_mascota($id_mascota);

			$num = 0;

			foreach ($query as $key) {
				$data['mascota'][$num] = array(
					'id' => $key->mas_id,
					'nombre'=> $key->mas_nombre
				);
				$num++;
			}

			$data['num_mascota'] = $num;

			$this->load->view('usuario/layers/header');
			$this->load->view('usuario/layers/menu');
			$this->load->view('usuario/reservaciones/reservar',$data);
			$this->load->view('usuario/layers/footer',$data);
		}	
	}

	public function addusuario()
	{
		if(!empty($_POST)) {
			
			$data = array(
				'us_nombre'=> $this->input->post('nom_usuario'),
				'us_ap_paterno'=> $this->input->post('ap_paterno'),
				'us_ap_materno'=> $this->input->post('ap_materno'),
				'us_tel_casa'=> $this->input->post('tel_casa'),
				'us_tel_cel'=> $this->input->post('tel_cel'),
				'us_email'=> $this->input->post('email'),
				'us_password'=> $this->input->post('password'),
				'us_dom_calle'=> $this->input->post('dom_calle'),
				'us_dom_localidad'=> $this->input->post('localidad'),
				'us_dom_municipio'=> $this->input->post('municipio'),
				'us_dom_estado'=> $this->input->post('estado')
				
				);
		}
		$this->usuarios_model->insertar_usuario($data);

		$query=$this->usuarios_model->ultimo_usuario();
		foreach ($query as $key => $value) {
			$id_usuario=$value;
		}
		$id_usuario->us_id;

		$mi_imagen = 'imagen_usuario';
        $config['upload_path'] = APPPATH . '..\assets\user\images\imagenes\perfil';
        $config['file_name'] = $id_usuario->us_id;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

		$this->load->library('upload', $config);

        if (!$this->upload->do_upload($mi_imagen)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }else{

        $data['uploadSuccess'] = $this->upload->data();
		}	



		redirect('usuarios/reservar');
	}

	public function crear_usuario()
	{
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/usuarios/crear_usuario');
		$this->load->view('usuario/layers/footer');	
	}

	public function addreservacion() {
		 $datos = $this->session->userdata('logged_user');
		if(!empty($_POST)) {
			$data = array(
				'res_temporada' => $this->input->post('temporadas'),
				'res_fecha_in' => $this->input->post('fech_in'),
				'res_fecha_out' => $this->input->post('fech_out'),
				'res_status' => 0,
				'res_no_habitacion' => 0,
				'res_id_usuario' => $datos->us_id
			);
		}

		$this->usuarios_model->insertar_reservacion($data);

		$id_serv = $this->input->post('id_serv');
		$shipping = $this->input->post('shipping');
		$redondo = $this->input->post('serv_domicilio_redondo');
		$baño = $this->input->post('baño_salida');
		$rev_veterinaria = $this->input->post('rev_veterinaria');
		$id_serv_redondo = $this->input->post('id_serv_redondo');
		$id_serv_sencillo = $this->input->post('id_serv_sencillo');

		$id_res = $this->usuarios_model->ultima_reservacion();

		foreach ($id_res as $key) {
			$data2['mas_res_id_res'] = $key->res_id;
		}

		$num = $this->input->post('num_mascota');
		$id_serv_mas = 0; //Esta varible es para asignarle el servicio de recogida a domicilio a un perro

		for ($i=0; $i <= $num; $i++) { 

			$baño = $this->input->post('baño_salida'.$i);
			$rev_veterinaria = $this->input->post('rev_veterinaria'.$i);

			$data2['mas_res_id_mas'] = $this->input->post('mascota'.$i);

			if ($data2['mas_res_id_mas']) {

				$this->usuarios_model->insertar_mascotas_reservaciones($data2);
				$id_serv_mas =  $this->input->post('mascota'.$i);
				
				if ($baño) {
					$id_serv = 2;
					$this->usuarios_model->add_servicio($data2['mas_res_id_res'], $id_serv, $data2['mas_res_id_mas']);
				}

				if ($rev_veterinaria) {
					$id_serv = 7;
					$this->usuarios_model->add_servicio($data2['mas_res_id_res'], $id_serv, $data2['mas_res_id_mas']);
				}
			}
		}

		if ($shipping == "true") {

			if ($redondo){
				$this->usuarios_model->add_servicio($data2['mas_res_id_res'], $id_serv_redondo, $id_serv_mas);
			}
			else{
				$this->usuarios_model->add_servicio($data2['mas_res_id_res'], $id_serv_sencillo, $id_serv_mas);
			}
		}
		redirect('usuarios/reservar');
	}

	public function editar_usuario(){
    $data = array('us_nombre' => $_POST['us_nombre'] ,
                  'us_ap_paterno' => $_POST['us_ap_paterno'],
                  'us_ap_materno' => $_POST['us_ap_materno'],
                  'us_tel_casa' => $_POST['us_tel_casa'],
                  'us_tel_cel' => $_POST['us_tel_cel'],
                  'us_dom_calle' => $_POST['us_dom_calle'],
                  'us_dom_localidad' => $_POST['us_dom_localidad'],
                  'us_dom_municipio' => $_POST['us_dom_municipio'],
                  'us_dom_estado' => $_POST['us_dom_estado'],
                  'us_email' => $_POST['us_email'],
                  'us_password' => $_POST['us_password']
                );
    $this->load->model('usuarios_model');   
    $this->usuarios_model->actualizar_usuario($data);
    redirect(base_url().'index.php/usuarios/perfil');    
  	}

	public function perfil()
	{
		if (!$this->session->userdata('logged_user')){
	        redirect('usuarios/login');
	    }else{
	    	$this->load->view('usuario/layers/header');
			$this->load->view('usuario/layers/menu');
	    	$datos = $this->session->userdata('logged_user');
	    	$id = $datos->us_id;
			$this->load->model('usuarios_model');
			$usuario = $this->usuarios_model->obtener_usuario($id);  
			    $Datousuario = array();
			    foreach($usuario as $item){
			        $itemUsuario = array();
			        $itemUsuario['us_nombre'] = $item['us_nombre'];
			        $itemUsuario['us_ap_paterno'] = $item['us_ap_paterno'];
			        $itemUsuario['us_ap_materno'] = $item['us_ap_materno'];
			        $itemUsuario['us_tel_casa'] = $item['us_tel_casa'];
			        $itemUsuario['us_tel_cel'] = $item['us_tel_cel'];
			        $itemUsuario['us_dom_calle'] = $item['us_dom_calle'];
			        $itemUsuario['us_dom_localidad'] = $item['us_dom_localidad'];
			        $itemUsuario['us_dom_municipio'] = $item['us_dom_municipio'];
			        $itemUsuario['us_dom_estado'] = $item['us_dom_estado'];
			        $itemUsuario['us_email'] = $item['us_email'];
			        $itemUsuario['us_password'] = $item['us_password'];
			        $Datousuario[] = $itemUsuario;
			    }
			    $data = array(
			        'usuario' => $Datousuario
			    ); 
			    $this->load->view('usuario/usuarios/perfil_usuario',$data);
			    $this->load->view('usuario/layers/footer');	
		}
	}

	public function agregar_mascota()
	{
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/usuarios/agregar_mascota');
		$this->load->view('usuario/layers/footer');	
	}

	public function addmascota()
	{
		if(!empty($_POST)) {
			$data = array(
				'mas_nombre'=> $this->input->post('nombre_mascota'),
				'mas_raza'=> $this->input->post('raza_mascota'),
				'mas_genero'=> $this->input->post('genero_mascota'),
				'mas_color'=> $this->input->post('color_mascota'),
				'mas_edad'=> $this->input->post('edad_mascota'),
				'mas_hora_comida'=> $this->input->post('hora_comida_mascota'),
				'mas_size'=> $this->input->post('tamaño_mascota'),
				'mas_esterilizado'=> $this->input->post('esterilizado_mascota'),
				'mas_agresivo'=> $this->input->post('agresivo_mascota'),
				'mas_medicamento'=> $this->input->post('medicamento_mascota'),
				'mas_observaciones'=> $this->input->post('observaciones_mascota'),
				'mas_id_usuario'=> $this->input->post('id_usuario')
				
				);
		}
		$this->usuarios_model->insertar_mascota($data);

		$query=$this->usuarios_model->ultima_mascota();
		foreach ($query as $key => $value) {
			$id_mascota=$value;
		}
		$mi_imagen = 'imagen_perro';
        $config['upload_path'] = APPPATH . '..\assets\user\images\imagenes\perros';
        $config['file_name'] = $id_mascota->mas_id;
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

		$this->load->library('upload', $config);

        if (!$this->upload->do_upload($mi_imagen)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }else{

        $data['uploadSuccess'] = $this->upload->data();
		}	
		redirect('usuarios/reservar');
	}

	public function mi_perfil()
	{
		$datos = $this->session->userdata('logged_user');
	    $id = $datos->us_id;
		$data['mascota']=$this->usuarios_model->obtener_mascota($id);
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/usuarios/perfil',$data);
		$this->load->view('usuario/layers/footer');	
	}

	public function contacto()
	{
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/layers/contacto');
		$this->load->view('usuario/layers/footer');	
	}

	public function galeria()
	{
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/layers/galeria');
		$this->load->view('usuario/layers/footer');	
	}

	public function preguntas()
	{
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/layers/preguntas');
		$this->load->view('usuario/layers/footer');	
	}

	public function entrenamiento()
	{
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/servicios/entrenamiento');
		$this->load->view('usuario/layers/footer');	
	}

	public function guarderia()
	{
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/servicios/guarderia');
		$this->load->view('usuario/layers/footer');	
	}

	public function hospedaje()
	{
		$this->load->view('usuario/layers/header');
		$this->load->view('usuario/layers/menu');
		$this->load->view('usuario/servicios/hospedaje');
		$this->load->view('usuario/layers/footer');	
	}

	
}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */