		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Usuario extends CI_Controller {
				function __construct()
			{
				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				$this->load->library('grocery_crud');

			}
			public function index()
			{
				redirect('usuario/cargar_grilla');
			}
				public function cargar_grilla()
				{

					try {
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_usuario');
				$crud->set_subject('Usuario');
				$crud->set_language('spanish');
				$crud->display_as('ID_NIVEL','NIVEL')
				->display_as('USUARIO','USUARIO')
				->display_as('LOGIN','LOGIN');
				$crud->callback_add_field('CLAVE',array($this,'add_field_callback_1'));
				$crud->callback_edit_field('CLAVE',array($this,'edit_field_callback_1'));
				$crud->set_relation('ID_NIVEL','t_nivel','DESCRIPCION');
				$crud->columns('USUARIO','LOGIN','ID_NIVEL');
				$crud->fields('USUARIO','LOGIN','CLAVE','ID_NIVEL');

				$crud->callback_insert(array($this,'encrypt_password_and_insert_callback'));
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common');
				$this->load->view('../../assets/inc/menu_principal');
				$this->load->view('usuario/usuario',$output);
				$this->load->view('../../assets/inc/footer');
				$this->load->view('../../assets/inc/footer_common_gc');
					//***********cargamos las vistas**************

					} catch (Exception $e) {
					show_error($e->getMessage().' --- '.$e->getTraceAsString());
					}

				}
			function encrypt_password_and_insert_callback($post_array)
			 {
				$this->load->library('encrypt');
				$post_array['clave'] =md5($post_array['clave']);
				return $this->db->insert('t_usuario',$post_array);
			}
			function add_field_callback_1() #PASSWORD
					{
					return  ' <input name="clave" type="password" class="form-control">';
					}
			function edit_field_callback_1($value, $primary_key) #EDITAR_PASSWORD
					{
					return  ' <input name="clave" type="password" class="form-control" value="'.$value.'">';

					}
		}

		/* End of file cliente.php */
		/* Location: ./application/controllers/cliente.php */