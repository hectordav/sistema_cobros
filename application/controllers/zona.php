<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Zona extends CI_Controller {
				function __construct()
			{
				parent::__construct();
				$this->load->helper('url');
				$this->load->database();
				$this->load->library('grocery_crud');
			}
			public function index()
			{
				redirect('zona/cargar_grilla');
			}
				public function cargar_grilla()
				{
					try {
					$crud = new grocery_CRUD();
				$crud->set_theme('bootstrap');
				$crud->set_table('t_zona');
				$crud->set_subject('Zona');
				$crud->set_language('spanish');
				$crud->display_as('DESCRIPCION','ZONA')
				->display_as('ID_PARROQUIA','PARROQUIA');
				$crud->set_relation('ID_PARROQUIA','t_parroquia','DESCRIPCION');
				$crud->required_fields('ID_PARROQUIA','DESCRIPCION');
				$crud->columns('DESCRIPCION','ID_PARROQUIA');
				$output = $crud->render();
				$this->load->view('../../assets/inc/head_common');
				$this->load->view('../../assets/inc/menu_principal');
				$this->load->view('zona/zona',$output);
				$this->load->view('../../assets/inc/footer');
				$this->load->view('../../assets/inc/footer_common_gc');
					} catch (Exception $e) {

					}


				}

		}