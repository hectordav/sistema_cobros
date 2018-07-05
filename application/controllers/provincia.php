<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Provincia extends CI_Controller {
				function __construct()
			{
				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				$this->load->library('grocery_crud');
			}
			public function index()
			{
				redirect('provincia/cargar_grilla');
			}
				public function cargar_grilla()
				{
					try {
						$crud = new grocery_CRUD();
						$crud->set_theme('bootstrap');
						$crud->set_table('t_provincia');
						$crud->set_subject('Provincia');
						$crud->set_language('spanish');
						$crud->columns('DESCRIPCION');
						$crud->display_as('DESCRIPCION','DESCRIPCION');
						$crud->required_fields('DESCRIPCION');
						$output = $crud->render();
						$this->load->view('../../assets/inc/head_common');
						$this->load->view('../../assets/inc/menu_principal');
						$this->load->view('provincia/provincia',$output);
						$this->load->view('../../assets/inc/footer');
						$this->load->view('../../assets/inc/footer_common_gc');
					} catch (Exception $e) {

					}


				}

		}

		/* End of file cliente.php */
		/* Location: ./application/controllers/cliente.php */