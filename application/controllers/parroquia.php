<?php
        defined('BASEPATH') OR exit('No direct script access allowed');
        class Parroquia extends CI_Controller {
                function __construct()
            {
                parent::__construct();
                $this->load->helper('url');
                $this->load->database();
                $this->load->model('combo_model');
                $this->load->library('grocery_crud');
            }
    public function index(){
        redirect('parroquia/cargar_grilla');
    }
    public function cargar_grilla(){

            try {
                       $data['estados'] = $this->combo_model->getEstados();

                        $crud = new grocery_CRUD();
                        $crud->set_theme('bootstrap');
                        $crud->set_table('t_parroquia');
                        $crud->set_subject('Parroquia');
                        $crud->set_language('spanish');
                        $crud->columns('DESCRIPCION','ID_CIUDAD');
                        $crud->display_as('DESCRIPCION','PARROQUIA')
                        ->display_as('ID_CIUDAD','CIUDAD');
                        $crud->set_relation('ID_CIUDAD','t_ciudad','DESCRIPCION');
                        $crud->required_fields('ID_CIUDAD','DESCRIPCION');
                        $output = $crud->render();
                        $this->load->view('../../assets/inc/head_common');
                        $this->load->view('../../assets/inc/menu_principal');
                        $this->load->view('parroquia/parroquia_gc',$output);
                        $this->load->view('../../assets/inc/footer');
                        $this->load->view('../../assets/inc/footer_common_gc');
                    } catch (Exception $e) {
            }

    }

    //****************************ESTO ES PARA UN FUTURO OJOOOO NO TOCAR********************
    public function fillCiudades() {
         $idEstado = $this->input->post('idEstado');
         echo $idEstado;

        if($idEstado){

            $ciudades = $this->combo_model->getCiudades($idEstado);
            echo '<option value="0">Seleccione Ciudad</option>';
            foreach($ciudades as $fila){
                echo '<option value="'. $fila->ID .'">'. $fila->DESCRIPCION.'</option>';
            }
        }  else {
            echo '<option value="0">Seleccione Ciudad</option>';
        }
    }
        public function fill_parroquia() {
         $id_parroquia = $this->input->post('idCiudad');

        if($id_parroquia){

            $parroquia = $this->combo_model->getParroquia($id_parroquia);
            echo '<option value="0">Seleccione Parroquia</option>';
            foreach($parroquia as $fila){
                echo '<option value="'. $fila->ID .'">'. $fila->DESCRIPCION.'</option>';
            }
        }  else {
            echo '<option value="0">Seleccione Parroquia</option>';
        }
    }
    public function fill_zona() {
         $id_parroquia = $this->input->post('idparroquia');

        if($id_parroquia){

            $zona = $this->combo_model->getzona($id_parroquia);
            echo '<option value="0">Seleccione Zona</option>';
            foreach($zona as $fila){
                echo '<option value="'. $fila->ID .'">'. $fila->DESCRIPCION.'</option>';
            }
        }  else {
            echo '<option value="0">Seleccione Zona</option>';
        }
    }
  //*******************************************************************************************

}
