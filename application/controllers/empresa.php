<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Empresa extends CI_Controller {
				function __construct()
			{
				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				$this->load->library('grocery_crud');
			}
			public function index()
			{
				redirect('empresa/cargar_grilla');
			}
				public function cargar_grilla()
				{
					try {
						$crud = new grocery_CRUD();
						$crud->set_theme('bootstrap');
						$crud->set_table('t_empresa');
						$crud->set_subject('Empresa');
						$crud->set_language('spanish');
						$crud->columns('CEDULA','NOMBRE','DIRECCION','TELF_1','TELF_2');
						$crud->display_as('TELF_1','TELEFONO 1')
						->display_as('TELF_2','TELEFONO 2');
						$crud->required_fields('CEDULA','NOMBRE','DIRECCION','TELF_1', 'TELF_2');
						$crud->unset_add();
						$crud->unset_delete();
						$output = $crud->render();
						$this->load->view('../../assets/inc/head_common');
						$this->load->view('../../assets/inc/menu_principal');
						$this->load->view('empresa/empresa',$output);
						$this->load->view('../../assets/inc/footer');
						$this->load->view('../../assets/inc/footer_common_gc');
					} catch (Exception $e) {

					}

				}

		}

		/* End of file cliente.php */
		/* Location: ./application/controllers/cliente.php */