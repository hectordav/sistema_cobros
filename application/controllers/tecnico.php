<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Tecnico extends CI_Controller {
				function __construct()
			{
				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				$this->load->library('grocery_crud');
			}
			public function index()
			{
				redirect('tecnico/cargar_grilla');
			}
				public function cargar_grilla()
				{
					try {
						$crud = new grocery_CRUD();
						$crud->set_theme('bootstrap');
						$crud->set_table('t_tecnico');
						$crud->set_subject('Tecnico');
						$crud->set_language('spanish');
						$crud->columns('CEDULA','NOMBRE','APELLIDO','TELF','DIRECCION');
						$crud->display_as('CEDULA','CEDULA')
						->display_as('NOMBRE','NOMBRE')
						->display_as('TELF','TELF')
						->display_as('DIRECCION','DIRECCION');

						$crud->required_fields('CEDULA','NOMBRE','APELLIDO','TELF','DIRECCION');
						$output = $crud->render();
						$this->load->view('../../assets/inc/head_common');
						$this->load->view('../../assets/inc/menu_principal');
						$this->load->view('tecnico/tecnico',$output);
						$this->load->view('../../assets/inc/footer');
						$this->load->view('../../assets/inc/footer_common_gc');
					} catch (Exception $e) {

					}


				}

		}

		/* End of file cliente.php */
		/* Location: ./application/controllers/cliente.php */