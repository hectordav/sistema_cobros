<? if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instalacion extends CI_Controller
 {
function __construct()
	{
		 parent::__construct();
		$this->load->helper('url');
		$this->load->helper('url_helper');
		$this->load->helper('date');
		$this->load->database();
	#***************para tomar un valor de una funcion del model (algo personal)**************
		$this->load->library('session');
		$this->load->library('grocery_crud');
		$this->load->model('cliente_model');
		$this->load->model('instalacion_model');
		$this->load->model('combo_model');
		$this->load->library('pagination');

	}
	public function index()
		{
		redirect('instalacion/cargar_grilla');
		}

	public function eliminar_instalacion_monto_cero(){


	}
	public function cargar_grilla()
				{
					try {
			$dato_instalacion=$this->instalacion_model->buscar_instalacion_monto_cero();
			while ( $dato_instalacion==true) {
				$dato = array('monto' =>0);
				$this->instalacion_model->borrar_instalacion_en_cero($dato);
				$dato_instalacion=$this->instalacion_model->buscar_instalacion_monto_cero();

			}
						$crud = new grocery_CRUD();
						$crud->set_theme('bootstrap');
						$crud->set_table('t_instalacion');
						$crud->set_subject('instalacion');
						$crud->set_language('spanish');
						$crud->columns('ID','DIRECCION', 'ID_ZONA','MONTO','OBSERVACIONES','ID_TECNICO','ID_STATUS_INSTALACION');
						$crud->display_as('ID','# INSTALACION')
						->display_as('ID_TECNICO','TECNICO')
						->display_as('ID_STATUS_INSTALACION','STATUS')
						 ->display_as('ID_USUARIO','USUARIO QUE REGISTRO LA INSTALACION')
						 ->display_as('ID_ZONA','ZONA')
						 ->display_as('ID_CLIENTE','CLIENTE')
						 ->display_as('ID_NODO','NODO');
						$crud->set_relation('ID_STATUS_INSTALACION','t_status_instalacion','DESCRIPCION');
						$crud->set_relation('ID_TECNICO','t_tecnico','NOMBRE');
						$crud->set_relation('ID_ZONA','t_zona','DESCRIPCION');
						$crud->set_relation('ID_NODO','t_nodo','DESCRIPCION');
						$crud->set_relation('ID_USUARIO','t_usuario','usuario');
						$crud->set_relation('ID_CLIENTE','t_cliente','nombre');
						 $crud->fields('ID_STATUS_INSTALACION','FECHA_INSTALACION','OBSERVACIONES','ID_NODO');
						$crud->unset_add();
						$crud->unset_print();
						$crud->unset_delete();
						$output = $crud->render();
						$this->load->view('../../assets/inc/head_common');
						$this->load->view('../../assets/inc/menu_principal');
						$this->load->view('instalacion/boton_nueva_instalacion');
						$this->load->view('instalacion/instalacion',$output);
						$this->load->view('../../assets/inc/footer');
						$this->load->view('../../assets/inc/footer_common_gc');
					} catch (Exception $e) {

					}
				}

	public function nueva_instalacion()
	{
		try {
		 /* Creamos el objeto */
		$this->db->select('id','nombre');
		$data['records'] = $this->db->get('t_cliente');
		$this->load->view('../../assets/inc/head_common_instalacion');
	#	$this->load->view('../../assets/inc/menu_principal');
		$this->load->view('../../assets/script/script_cliente');
		$this->load->view('instalacion/nueva_instalacion', $data);
		$this->load->view('modal/modal_cliente');
		$this->load->view('../../assets/inc/footer_common_gc');
		} catch (Exception $e) {
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
			}
		}

	public function get_cliente_existe()
	{
			$id=$this->input->post('txt_id_cliente');
			$data= $this->cliente_model->get($id);
				echo json_encode($data);
	}
	public function get_cliente_autocom()
	{
			$match = $this->input->get('term', TRUE);  # TRUE para hacer un filtrado XSS
			$item = $this->input->get('item', TRUE);
			$data['item'] = $item;
			$data['results']= $this->cliente_model->get_data($item,$match);
			$this->load->view('cliente/data',$data);
	}
	public function guardar_instalacion()
	{
		try {
			$cedula=$this->input->post('txt_id_cliente');
			date_default_timezone_set("America/Caracas");
		$datos['obcliente']=$this->cliente_model->buscar_cliente($cedula);
			$datos_provincia['estados'] = $this->combo_model->getEstados();
			$datos_tecnico['tecnico'] = $this->combo_model->tecnico();

			foreach ($datos['obcliente']->result() as $data)
				{
				$datos_cliente = array('id' =>$data->id,
				'nombre' =>$data->nombre,
				'apellido' =>$data->apellido,
				'direccion' =>$data->direccion,
				'telf' =>$data->telef_1,
				'correo' =>$data->correo
				); #fin del array.
				}; #fin del foreach.
			$id_cliente=$datos_cliente['id'];
			$fecha = date('Y-m-d');
			#***********************ojo quitar para cuando cree la sesion*****************
			$usuario='1';
			#*****************************************************************************
			$monto="0";
			$this->instalacion_model->guardar($id_cliente, $fecha,$usuario);
			$datos_instalacion['inst']=$this->instalacion_model->buscar_instalacion_id_cliente($id_cliente, $monto);
			foreach ($datos_instalacion['inst']->result() as $data)
				{
				$instalacion = array('id' =>$data->ID,
				'fecha' =>$data->FECHA
				); #fin del array.
				}; #fin del foreach.
				$datos_i = array(
					'id_instalacion' =>$instalacion['id'],
					'fecha' =>$instalacion['fecha'],
					'nombre_cliente' =>$datos_cliente['nombre'],
					'apellido_cliente' =>$datos_cliente['apellido'],
					'direccion_cliente' =>$datos_cliente['direccion']
				 );#fin del array
			$this->load->view('../../assets/inc/head_common_instalacion');
			$this->load->view('../../assets/inc/menu_principal');
			$this->load->view('instalacion/det_instalacion',$datos_i);
			$this->load->view('instalacion/combo', $datos_provincia);
			$this->load->view('instalacion/cajas_observacion_direccion');
			$this->load->view('instalacion/combo_tecnico',$datos_tecnico);
			$this->load->view('instalacion/grilla');
			$this->load->view('../../assets/script/script_combo');
			$this->load->view('../../assets/inc/footer_common_gc');

		} catch (Exception $e) {
				show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function mostrar_det_instalacion(){

		$id_instalacion= $this->input->post('lbl_instalacion');
		#$id_instalacion="114";
			$datos=$this->instalacion_model->mostrar_det_instalacion($id_instalacion);
			echo json_encode($datos);
		}
		public function guardar_det_instalacion(){
			if($this->input->is_ajax_request()){
				$id_instalacion= $this->input->post('lbl_instalacion');
				$equipo= $this->input->post('txt_equipo');
				$cantidad= $this->input->post('txt_cantidad');
			$datos=$this->instalacion_model->guardar_det_instalacion($id_instalacion,$equipo,$cantidad);

			}

		}

	public function eliminar_det_instalacion(){
			if($this->input->is_ajax_request()){
				$id_instalacion= $this->input->post('lbl_instalacion');
				$equipo= $this->input->post('txt_equipo');
				$cantidad= $this->input->post('txt_cantidad');
			$datos=$this->instalacion_model->guardar_det_instalacion($id_instalacion,$equipo,$cantidad);

			}

		}
	public function actualizar_instalacion(){
				$id_instalacion= $this->input->post('lbl_instalacion_2');
				$status_instalacion='2';
				$tecnico=$this->input->post('id_tecnico');
				$direccion=$this->input->post('id_direccion');
				$referencia=$this->input->post('id_referencia');
				$monto=$this->input->post('txt_monto');
				$id_zona= $this->input->post('id_zona');
				$observacion=$this->input->post('id_observacion');
				#*************array************************
				$datos_actualizar = array('ID_STATUS_INSTALACION' =>$status_instalacion,
				'ID_TECNICO' =>$tecnico,
				'ID_ZONA' =>$id_zona,
				'DIRECCION' =>$direccion,
				'REFERENCIA_UBICACION' =>$referencia,
				'MONTO' =>$monto,
				'OBSERVACIONES' =>$observacion
				 ); #fin del arrary.
				$datos_det_instalacion['det_instalacion']=$this->instalacion_model->mostrar_det_instalacion_imprimir($id_instalacion);
				$datos=$this->instalacion_model->actualizar_instalacion($datos_actualizar,$id_instalacion);
				$datos_instalacion=$this->instalacion_model->buscar_instalacion($id_instalacion);
				foreach ($datos_instalacion->result() as $data) {
					$datos_instalacion_extraidos = array('id' =>$data->ID,
						'id_usuario' =>$data->ID_USUARIO,
						'id_status_intalacion' =>$data->ID_STATUS_INSTALACION,
						'id_tecnico' =>$data->ID_TECNICO,
						'id_cliente' =>$data->ID_CLIENTE,
						'id_nodo' =>$data->ID_NODO,
						'id_zona' =>$data->ID_ZONA,
						'fecha' =>$data->FECHA,
						'direccion' =>$data->DIRECCION,
						'referencia' =>$data->REFERENCIA_UBICACION,
						'monto' =>$data->MONTO,
						'OBSERVACIONES' =>$data->OBSERVACIONES
					 ); #fin del array
				}	#fin del foreach
				$id_usuario= $datos_instalacion_extraidos['id_usuario'];
				$id_tecnico=$datos_instalacion_extraidos['id_tecnico'];
				$id_cliente= $datos_instalacion_extraidos['id_cliente'];
				$id_zona= $datos_instalacion_extraidos['id_zona'];


				$datos_usuario=$this->instalacion_model->buscar_usuario($id_usuario);
				$datos_empresa=$this->instalacion_model->buscar_empresa();
				$datos_tecnico=$this->instalacion_model->buscar_tecnico($id_tecnico);
				$datacliente['cliente']=$this->instalacion_model->buscar_cliente($id_cliente);
				$datos_zona=$this->instalacion_model->buscar_zona($id_zona);
				foreach ($datos_usuario->result() as $data) {
					$datos_usuario_extraido = array('USUARIO' =>$data->USUARIO);#fin
				}#fin foreach
				foreach ($datos_tecnico->result() as $data) {
					$datos_tecnico_extraido = array('NOMBRE' => $data->NOMBRE);#fin
				} #fin foreach
				foreach ($datos_empresa->result() as $data) {
					$datos_empresa = array('CEDULA' => $data->CEDULA,
						'NOMBRE' => $data->NOMBRE,
						'DIRECCION' => $data->DIRECCION,
						'TELF_1' => $data->TELF_1,
						'TELF_2' => $data->TELF_2); #fin array
				} # fin foreach.
				foreach ($datos_zona->result() as $data) {
						$datos_zona_extraido = array('DESCRIPCION' =>$data->DESCRIPCION);#fin
				} #fin foreach.

	$this->load->view('instalacion/impresion/cabecera_ne',$datos_empresa);
	$this->load->view('instalacion/impresion/num_instalacion',$datos_instalacion_extraidos);
	$this->load->view('instalacion/impresion/cliente',$datacliente);
	$this->load->view('instalacion/impresion/datos_instalacion',$datos_instalacion_extraidos);
	$this->load->view('instalacion/impresion/datos_tecnico',$datos_tecnico_extraido);
	$this->load->view('instalacion/impresion/grilla_det_instalacion',$datos_det_instalacion);
					}

	}

/* End of file productos.php */
/* Location: ./application/controllers/productos.php */

?>