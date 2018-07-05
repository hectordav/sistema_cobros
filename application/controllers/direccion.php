<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Direccion extends CI_Controller {
				function __construct()
			{
				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				$this->load->library('grocery_crud');
			}
			public function index()
			{
				redirect('direccion/cargar_grilla');
			}
				public function cargar_grilla()
				{
					try {
					$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_direccion');
				$crud->set_subject('Direccion');
				$crud->set_language('spanish');
				$crud->display_as('REFERENCIA_UBICACION','PUNTO DE REFERENCIA')
				->display_as('ID_ZONA','ZONA');
				$crud->set_relation('ID_ZONA','t_zona','DESCRIPCION');
				$crud->columns('ID_ZONA','DIRECCION','REFERENCIA_UBICACION');
				$crud->required_fields('ID_ZONA','DIRECCION','REFERENCIA_UBICACION');
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common');
				$this->load->view('../../assets/inc/menu_principal');
				$this->load->view('direccion/direccion',$output);
				$this->load->view('../../assets/inc/footer');
				$this->load->view('../../assets/inc/footer_common_gc');
					} catch (Exception $e) {
					}
				}

		}

		/* End of file cliente.php */
		/* Location: ./application/controllers/cliente.php */