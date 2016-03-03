<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Habitaciones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administradores_model');
		$this->load->model('usuarios_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$now = time();

		$data['fecha'] = unix_to_human($now,TRUE);

		$data['lugares'] = $this->administradores_model->lugares($data['fecha']);

		if ($data['lugares']) {
			$data['disponible'] = TRUE;
		}
		else{
			$data['disponible'] = FALSE;
		}

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/habitaciones/lugares',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function detalles($num_habitacion)
	{
		if ($num_habitacion) {
			$data['num_habitacion'] = $num_habitacion;
		}
		else{
			$data['num_habitacion'] = $this->uri->segment(3);
		}

		$query = $this->administradores_model->habitacion($data['num_habitacion']);

		foreach ($query as $key) {
			$data['reservacion'] = array(
				'id' => $key->res_id,
				'fecha_in'=> $key->res_fecha_in,
				'fecha_out'=> $key->res_fecha_out,
				'temporada'=> $key->res_temporada
			);
			$id = $key->res_id_usuario;
		}

		$query = $this->administradores_model->res_usuario($id);

		foreach ($query as $key) {
			$data['usuario'] = array(
				'id' => $key->us_id,
				'nombre'=> $key->us_nombre,
				'paterno'=> $key->us_ap_paterno,
				'materno'=> $key->us_ap_materno,
				'correo' => $key->us_email,
				'casa'=> $key->us_tel_casa,
				'cel'=> $key->us_tel_cel,
				'calle'=> $key->us_dom_calle,
				'localidad'=> $key->us_dom_localidad,
				'municipio'=> $key->us_dom_municipio,
				'estado'=> $key->us_dom_estado
			);
		}

		$query = $this->administradores_model->res_id_mascota($data['reservacion']['id']);

		$id_mascota = array();

		foreach ($query as $key => $value) {
			$id_mascota[] = $value->mas_res_id_mas;
		}

		$query = $this->administradores_model->res_mascota($id_mascota);

		$num = 0;

		foreach ($query as $key) {
			$data['mascota'][$num] = array(
				'id' => $key->mas_id,
				'nombre'=> $key->mas_nombre,
				'size'=> $key->mas_size,
				'raza'=> $key->mas_raza,
				'genero'=> $key->mas_genero,
				'color'=> $key->mas_color,
				'edad'=> $key->mas_edad,
				'hora_comida'=> $key->mas_hora_comida,
				'esterilizado'=> $key->mas_esterilizado,
				'agresivo'=> $key->mas_agresivo,
				'medicamento'=> $key->mas_medicamento,
				'observaciones'=> $key->mas_observaciones,
			);
			$data['servicios'][$data['mascota'][$num]['nombre']] = $this->administradores_model->get_servicios($data['reservacion']['id'],$data['mascota'][$num]['id']);
			$data['productos'][$data['mascota'][$num]['nombre']] = $this->administradores_model->get_productos($data['reservacion']['id'],$data['mascota'][$num]['id']);
			$data['paquetes'][$data['mascota'][$num]['nombre']] = $this->administradores_model->get_paquetes($data['reservacion']['id'],$data['mascota'][$num]['id']);
			$num++;
		}

		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/habitaciones/detalles',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function mostrar()
	{
		$data['resultado'] = TRUE;

		$data['num_habitacion'] = $this->uri->segment(5);

		$data['res_id'] = $this->uri->segment(3);
		if (!$data['res_id']) {
			$data['res_id'] = $this->input->post('res_id');
		}

		$data['mas_id'] = $this->uri->segment(4);
		if (!$data['mas_id']) {
			$data['mas_id'] = $this->input->post('mas_id');
		}

		$name = $this->input->post('nombre');
		
		if (!$name) {
			$name = '';
		}

		$tabla = $this->input->post('tabla');

		if (!$tabla) {
			$tabla = 0;
		}

		switch ($tabla) {
			case 1:
				$query = $this->administradores_model->buscar_servicios($data['res_id'],$data['mas_id']);
				if($query){
					$resultado = array();
					foreach ($query as $key => $value) {
						$resultado[] = $value->res_serv_id_serv;
					}
				}
				else
					$resultado = 0;
				$data['servicios'] = $this->administradores_model->buscar_servicios2($name, $resultado);
				$data['productos'] = array();
				$data['paquetes'] = array();

				if (!$data['servicios']) {
					$data['resultado'] = FALSE;
				}
				break;

			case 2:
				$query = $this->administradores_model->buscar_productos($data['res_id'],$data['mas_id']);
				if($query){
					$resultado = array();
					foreach ($query as $key => $value) {
						$resultado[] = $value->res_prod_id_prod;
					}
				}
				else
					$resultado = 0;
				$data['productos'] = $this->administradores_model->buscar_productos2($name, $resultado);
				$data['servicios'] = array();
				$data['paquetes'] = array();

				if (!$data['productos']) {
					$data['resultado'] = FALSE;
				}
				break;

			case 3:
				$query = $this->administradores_model->buscar_paquetes($data['res_id'],$data['mas_id']);
				if($query){
					$resultado = array();
					foreach ($query as $key => $value) {
						$resultado[] = $value->res_paque_id_paque;
					}
				}
				else
					$resultado = 0;
				$data['paquetes'] = $this->administradores_model->buscar_paquetes2($name, $resultado);
				$data['servicios'] = array();
				$data['productos'] = array();

				if (!$data['paquetes']) {
					$data['resultado'] = FALSE;
				}
				break;
			
			default:
				$query = $this->administradores_model->buscar_servicios($data['res_id'],$data['mas_id']);
				if($query){
					$resultado = array();
					foreach ($query as $key => $value) {
						$resultado[] = $value->res_serv_id_serv;
					}
				}
				else
					$resultado = 0;
				$data['servicios'] = $this->administradores_model->buscar_servicios2($name, $resultado);
				
				$query = $this->administradores_model->buscar_productos($data['res_id'],$data['mas_id']);
				if($query){
					$resultado = array();
					foreach ($query as $key => $value) {
						$resultado[] = $value->res_prod_id_prod;
					}
				}
				else
					$resultado = 0;
				$data['productos'] = $this->administradores_model->buscar_productos2($name, $resultado);

				$query = $this->administradores_model->buscar_paquetes($data['res_id'],$data['mas_id']);
				if($query){
					$resultado = array();
					foreach ($query as $key => $value) {
						$resultado[] = $value->res_paque_id_paque;
					}
				}
				else
					$resultado = 0;
				$data['paquetes'] = $this->administradores_model->buscar_paquetes2($name, $resultado);

				if (!$data['paquetes'] && !$data['servicios'] && !$data['productos']) {
					$data['resultado'] = FALSE;
				}
				break;
				break;
		}
		
		$this->load->view('administrador/layers/header');
		$this->load->view('administrador/layers/menu');
		$this->load->view('administrador/habitaciones/agregar',$data);
		$this->load->view('administrador/layers/footer');
	}

	public function agregar_servicio_reservacion()
	{
		$data['res_serv_id_res'] = $this->uri->segment(3);
		$data['res_serv_id_mas'] = $this->uri->segment(4);
		$data['res_serv_id_serv'] = $this->uri->segment(5);
		$data['res_serv_cantidad'] = 1;
		
		$this->administradores_model->agregar_servicio_reservacion($data);

		$num_habitacion = $this->uri->segment(6);

		$this->detalles($num_habitacion);
	}

	public function agregar_producto_reservacion()
	{
		$data['res_prod_id_res'] = $this->uri->segment(3);
		$data['res_prod_id_mas'] = $this->uri->segment(4);
		$data['res_prod_id_prod'] = $this->uri->segment(5);
		$data['res_prod_cantidad'] = 1;
		
		$this->administradores_model->agregar_producto_reservacion($data);

		$num_habitacion = $this->uri->segment(6);

		$this->detalles($num_habitacion);
	}

	public function agregar_paquete_reservacion()
	{
		$data['res_paque_id_res'] = $this->uri->segment(3);
		$data['res_paque_id_mas'] = $this->uri->segment(4);
		$data['res_paque_id_paque'] = $this->uri->segment(5);
		$data['res_paque_cantidad'] = 1;
		
		$this->administradores_model->agregar_paquete_reservacion($data);

		$num_habitacion = $this->uri->segment(6);

		$this->detalles($num_habitacion);
	}

	public function agregar_servicio()
	{
		$data['res_serv_id_res'] = $this->uri->segment(3);
		$data['res_serv_id_mas'] = $this->uri->segment(4);
		$data['res_serv_id_serv'] = $this->uri->segment(5);
		$data['res_serv_cantidad'] = $this->uri->segment(6) + 1;

		$data['resultado'] = $this->administradores_model->agregar_servicio($data);

		$data['num_habitacion'] = $this->uri->segment(7);

		header('Location: http://localhost/hotelcaninoreyes/index.php/habitaciones/detalles/'.$data['num_habitacion']);
	}

	public function quitar_servicio()
	{
		$data['res_serv_id_res'] = $this->uri->segment(3);
		$data['res_serv_id_mas'] = $this->uri->segment(4);
		$data['res_serv_id_serv'] = $this->uri->segment(5);
		$data['res_serv_cantidad'] = $this->uri->segment(6) - 1;

		$this->administradores_model->quitar_servicio($data);

		$data['num_habitacion'] = $this->uri->segment(7);

		header('Location: http://localhost/hotelcaninoreyes/index.php/habitaciones/detalles/'.$data['num_habitacion']);
	}

	public function borrar_servicio()
	{
		$data['res_serv_id_res'] = $this->uri->segment(3);
		$data['res_serv_id_mas'] = $this->uri->segment(4);
		$data['res_serv_id_serv'] = $this->uri->segment(5);

		$this->administradores_model->borrar_servicio($data);

		$num_habitacion = $this->uri->segment(6);

		$this->detalles($num_habitacion);
	}

	public function agregar_producto()
	{
		$data['res_prod_id_res'] = $this->uri->segment(3);
		$data['res_prod_id_mas'] = $this->uri->segment(4);
		$data['res_prod_id_prod'] = $this->uri->segment(5);
		$data['res_prod_cantidad'] = $this->uri->segment(6) + 1;
		$cantidad['prod_cantidad'] = $this->uri->segment(7) - 1;

		$this->administradores_model->agregar_producto($data, $cantidad);

		$data['num_habitacion'] = $this->uri->segment(8);

		header('Location: http://localhost/hotelcaninoreyes/index.php/habitaciones/detalles/'.$data['num_habitacion']);
	}

	public function quitar_producto()
	{
		$data['res_prod_id_res'] = $this->uri->segment(3);
		$data['res_prod_id_mas'] = $this->uri->segment(4);
		$data['res_prod_id_prod'] = $this->uri->segment(5);
		$data['res_prod_cantidad'] = $this->uri->segment(6) - 1;
		$cantidad['prod_cantidad'] = $this->uri->segment(7) + 1;

		$this->administradores_model->agregar_producto($data, $cantidad);

		$data['num_habitacion'] = $this->uri->segment(8);

		header('Location: http://localhost/hotelcaninoreyes/index.php/habitaciones/detalles/'.$data['num_habitacion']);
	}

	public function borrar_producto()
	{
		$data['res_prod_id_res'] = $this->uri->segment(3);
		$data['res_prod_id_mas'] = $this->uri->segment(4);
		$data['res_prod_id_prod'] = $this->uri->segment(5);

		$this->administradores_model->borrar_producto($data);

		$num_habitacion = $this->uri->segment(6);

		$this->detalles($num_habitacion);
	}

	public function agregar_paquete()
	{
		$data['res_paque_id_res'] = $this->uri->segment(3);
		$data['res_paque_id_mas'] = $this->uri->segment(4);
		$data['res_paque_id_paque'] = $this->uri->segment(5);
		$data['res_paque_cantidad'] = $this->uri->segment(6) + 1;

		$this->administradores_model->agregar_paquete($data);

		$data['num_habitacion'] = $this->uri->segment(7);

		header('Location: http://localhost/hotelcaninoreyes/index.php/habitaciones/detalles/'.$data['num_habitacion']);
	}

	public function quitar_paquete()
	{
		$data['res_paque_id_res'] = $this->uri->segment(3);
		$data['res_paque_id_mas'] = $this->uri->segment(4);
		$data['res_paque_id_paque'] = $this->uri->segment(5);
		$data['res_paque_cantidad'] = $this->uri->segment(6) - 1;

		$this->administradores_model->quitar_paquete($data);

		$data['num_habitacion'] = $this->uri->segment(7);

		header('Location: http://localhost/hotelcaninoreyes/index.php/habitaciones/detalles/'.$data['num_habitacion']);
	}

	public function borrar_paquete()
	{
		$data['res_paque_id_res'] = $this->uri->segment(3);
		$data['res_paque_id_mas'] = $this->uri->segment(4);
		$data['res_paque_id_paque'] = $this->uri->segment(5);

		$this->administradores_model->borrar_paquete($data);

		$num_habitacion = $this->uri->segment(6);

		$this->detalles($num_habitacion);
	}

	public function dar_baja()
	{
		$data['res_id'] = $this->input->post('id');
		$data['nombre_usuario'] = $this->input->post('nombre_us');
        $data['paterno'] = $this->input->post('apellido_paterno');
        $data['materno'] = $this->input->post('apellido_materno');
        $data['nombre_mascota'] = $this->input->post('nombre_mascota');
        $data['fecha_in'] = $this->input->post('fecha_in');
        $data['fecha_out'] = $this->input->post('fecha_out');
        $data['tamaño'] = $this->input->post('tamaño');
        
        $query = $this->administradores_model->producto_cantidad_precio($data['res_id']);  
        if ($query) {
        	/*foreach ($query as $key) {
        		$data['servicios'] = $key->res_prod_id_prod;
        	}*/
        	$data['productos'] = $query;
        }
        else {
        	$data['productos'] = FALSE;
        }

        $query = $this->administradores_model->servicio_cantidad_precio($data['res_id']);
        if ($query) {
        	$data['servicios'] = $query;
        }
        else {
        	$data['servicios'] = FALSE;
        }

        $query = $this->administradores_model->paquete_cantidad_precio($data['res_id']);
        if ($query) {
        	$data['paquetes'] = $query;
        }
        else {
        	$data['paquetes'] = FALSE;
        }

        $this->generar_pdf($data);
	}
	
	public function generar_pdf($data)
	{
		$this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Hotel Canino Reyes');
        $pdf->SetTitle('Factura de estancia');
        $pdf->SetSubject('Nombre de la mascota');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
 
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('Helvetica', '', 14, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
//Contenido del PDF

        $total = 0;

        //resto a una fecha la otra
        $segundos_diferencia = human_to_unix($data['fecha_in']) - human_to_unix($data['fecha_out']);

        
        
        //convierto segundos en días 
		$dias_diferencia = $segundos_diferencia / (60 * 60 * 24); 

		//obtengo el valor absoulto de los días (quito el posible signo negativo) 
		$dias_diferencia = abs($dias_diferencia); 

		//quito los decimales a los días de diferencia 
		$dias_diferencia = floor($dias_diferencia); 

		switch ($data['tamaño']) {
			case '0':
				$tamaño = 'Chico';
				$precio_dias=80;
				break;

			case '1':
				$tamaño = 'Mediano';
				$precio_dias=100;
				break;

			case '2':
				$tamaño = 'Grande';
				$precio_dias=120;
				break;

			case '3':
				$tamaño = 'Extra grande';
				$precio_dias=150;
				break;
			
			default:
				$precio_dias=1;
				break;
		}

		$html = "<style type=text/css>
				 	p { 
				 		font-size: 10pt;
				 	}
				</style>";

		$html .= "<h5>Cliente</h5>"; 
        $html .= "<p> <strong>Nombre del dueño: </strong>". $data['nombre_usuario']." ".$data['paterno']." ". $data['materno']."</p>";

        $html .= "<h5>Canino</h5>";
       	$html .= "<p> <strong>Nombre del perro: </strong>".$data['nombre_mascota']."</p>";
       	$html .= "<p> <strong>Tamaño: </strong>".$tamaño."</p>";

       	$html .= "<h5>Servicio</h5>";
       	$html .= "<p><strong>Fecha de entrada:</strong> ".$data['fecha_in']."</p> 
       			  <p><strong>Fecha de salida:</strong> ".$data['fecha_out']."</p>";

		$html .= "<table cellspacing='0' cellpadding='1' border='1'>";
		$html .= "	<tr>";
		$html .= "		<td>Nombre</td>";
		$html .= "      <td>cantidad</td>";
		$html .= "		<td>Total</td>";
		$html .= "	</tr>";
		if ($data['productos']) {
			foreach ($data['productos'] as $key) {
       		$html .= "	<tr>";
       		$html .= "		<td>".$key->prod_nombre."</td>";
       		$html .= "		<td>".$key->res_prod_cantidad."</td>";
       		$html .= "		<td>$".$key->res_prod_cantidad * $key->prod_precio."</td>";
       		$html .= "	</tr>";
       		$total += $key->res_prod_cantidad * $key->prod_precio;
       		}
		}

		if ($data['servicios']) {
			foreach ($data['servicios'] as $key) {
       		$html .= "	<tr>";
       		$html .= "		<td>".$key->serv_nombre."</td>";
       		$html .= "		<td>".$key->res_serv_cantidad."</td>";
       		$html .= "		<td>$".$key->res_serv_cantidad * $key->serv_precio."</td>";
       		$html .= "	</tr>";
       		$total += $key->res_serv_cantidad * $key->serv_precio;
       		}
		}

		if ($data['paquetes']) {
			foreach ($data['paquetes'] as $key) {
       		$html .= "	<tr>";
       		$html .= "		<td>".$key->paque_nombre."</td>";
       		$html .= "		<td>".$key->res_paque_cantidad."</td>";
       		$html .= "		<td>$".$key->res_paque_cantidad * $key->paque_precio."</td>";
       		$html .= "	</tr>";
       		$total += $key->res_paque_cantidad * $key->paque_precio;
       		}
		}

		$html .= "	<tr>";
   		$html .= "		<td>Dias</td>";
   		$html .= "		<td>".$dias_diferencia."</td>";
   		$html .= "		<td>$".$dias_diferencia * $precio_dias."</td>";
   		$html .= "	</tr>";

   		$total += $dias_diferencia * $precio_dias;

		$html .= "	<tr>";
   		$html .= "		<td></td>";
   		$html .= "		<td>TOTAL</td>";
   		$html .= "		<td>$".$total."</td>";
   		$html .= "	</tr>";
       	
       	$html .= "</table>";

//Contenido del PDF
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCELL($w = 0, $h = 0, $x = '', $y = '55', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("hotelCaninoReyes.pdf");
        $pdf->Output($nombre_archivo, 'I');
	}
}

/* End of file habitaciones.php */
/* Location: ./application/controllers/habitaciones.php */