<?php
class Parroquia_combo extends CI_Controller{
    //put your code here
         public function index(){
                $this->load->model('combo_model');
                $data['estados'] = $this->combo_model->getEstados();
                $this->load->view('parroquia/parroquia_combo', $data);
            }

    public function fillCiudades() {
        $idEstado = $this->input->post('idEstado');

        if($idEstado){
            $this->load->model('combo_model');
            $ciudades = $this->combo_model->getCiudades($idEstado);
            echo '<option value="0">Ciudades</option>';
            foreach($ciudades as $fila){
                echo '<option value="'. $fila->ID_PROVINCIA .'">'. $fila->DESCRIPCION .'</option>';
            }
        }  else {
            echo '<option value="0">Ciudades</option>';
        }
    }

    public function hacerAlgo() {
        $idEstado = $this->input->post('idEstado');
        $idCiudad = $this->input->post('idCiudad');

        echo 'idEstado = '. $idEstado. '; idCiudad = '. $idCiudad;
    }
}