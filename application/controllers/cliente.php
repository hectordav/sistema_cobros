<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Cliente extends CI_Controller {
				function __construct()
			{
				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				$this->load->library('grocery_crud');
			}
			public function index()
			{
				redirect('cliente/cargar_grilla');
			}
				public function cargar_grilla()
				{
					try {
						$crud = new grocery_CRUD();
						$crud->set_theme('bootstrap');
						$crud->set_table('t_cliente');
						$crud->set_subject('Cliente');
						$crud->set_language('spanish');
						$crud->columns('rif','nombre', 'apellido', 'direccion','telef_1', 'correo');
						$crud->display_as('rif','CEDULA')
						->display_as('nombre','NOMBRE')
						->display_as('apellido','APELLIDO')
						->display_as('direccion','DIRECCION')
						->display_as('telef_1','TELEFONO')
						->display_as('correo','EMAIL');
						$crud->required_fields('rif','nombre', 'apellido', 'direccion','telef_1', 'correo');

						$output = $crud->render();
						$this->load->view('../../assets/inc/head_common');
						$this->load->view('../../assets/inc/menu_principal');
						$this->load->view('cliente/cliente',$output);
						$this->load->view('../../assets/inc/footer');
						$this->load->view('../../assets/inc/footer_common_gc');
					} catch (Exception $e) {

					}


				}

		}

		/* End of file cliente.php */
		/* Location: ./application/controllers/cliente.php */