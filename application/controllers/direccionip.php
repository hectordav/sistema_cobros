<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Direccionip extends CI_Controller {
				function __construct()
			{
				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				$this->load->library('grocery_crud');
			}
			public function index()
			{
				redirect('direccionip/cargar_grilla');
			}
				public function cargar_grilla()
				{
					try {
				$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_direccion_ip');
				$crud->set_subject('Direccion Ip');
				$crud->set_language('spanish');
				$crud->display_as('DIRECCION_IP','DIRECCION IP')
				->display_as('ID_INSTALACION',' # INSTALACION');
				$crud->set_relation('ID_INSTALACION','t_instalacion','ID');
				$crud->columns('ID_INSTALACION','DIRECCION_IP');
				$crud->required_fields('ID_INSTALACION','DIRECCION_IP');
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common');
				$this->load->view('../../assets/inc/menu_principal');
				$this->load->view('direccion_ip/direccion_ip',$output);
				$this->load->view('../../assets/inc/footer');
				$this->load->view('../../assets/inc/footer_common_gc');
					} catch (Exception $e) {
					}
				}

		}

		/* End of file cliente.php */
		/* Location: ./application/controllers/cliente.php */