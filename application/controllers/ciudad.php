<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Ciudad extends CI_Controller {
				function __construct()
			{
				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				$this->load->library('grocery_crud');
			}
			public function index()
			{
				redirect('ciudad/cargar_grilla');
			}
				public function cargar_grilla()
				{
					try {
					$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_ciudad');
				$crud->set_subject('Ciudad');
				$crud->set_language('spanish');
				$crud->display_as('DESCRIPCION','CIUDAD')
				->display_as('ID_PROVINCIA','PROVINCIA');
				$crud->set_relation('ID_PROVINCIA','t_provincia','DESCRIPCION');
				$crud->columns('ID_PROVINCIA','DESCRIPCION');
				$crud->required_fields('ID_PROVINCIA','DESCRIPCION');
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common');
				$this->load->view('../../assets/inc/menu_principal');
				$this->load->view('ciudad/ciudad',$output);
				$this->load->view('../../assets/inc/footer');
				$this->load->view('../../assets/inc/footer_common_gc');
					} catch (Exception $e) {
					}
				}

		}

		/* End of file cliente.php */
		/* Location: ./application/controllers/cliente.php */