<?php
class Modelcomboboxes extends CI_Model{
    //put your code here
    public function getEstados() {
        $this->db->order_by('DESCRIPCION', 'asc');
        $estados = $this->db->get('t_provincia');

        if($estados->num_rows() > 0){
            return $estados->result();
        }
    }

    public function getCiudades($idEstado) {
        $this->db->where('ID_PROVINCIA', $idEstado);
        $this->db->order_by('DESCRIPCION', 'asc');
        $ciudades = $this->db->get('t_ciudad');

        if($ciudades->num_rows() > 0){
            return $ciudades->result();
        }
    }
}
