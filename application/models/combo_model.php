<?php
class Combo_model extends CI_Model{
    //put your code here
    public function getEstados() {
        $this->db->order_by('DESCRIPCION', 'asc');
        $estados = $this->db->get('T_PROVINCIA');

        if($estados->num_rows() > 0){
            return $estados->result();
        }
    }

       public function getCiudades($idEstado) {
        $this->db->where('ID_PROVINCIA', $idEstado);
        $this->db->order_by('DESCRIPCION', 'asc');
        $ciudades = $this->db->get('T_CIUDAD');
        if($ciudades->num_rows() > 0){
            return $ciudades->result();
        }
    }
     public function getParroquia($idciudad) {
        $this->db->where('ID_CIUDAD', $idciudad);
        $this->db->order_by('DESCRIPCION', 'asc');
        $parroquia = $this->db->get('T_PARROQUIA');
        if($parroquia->num_rows() > 0){
            return $parroquia->result();
        }
    }
     public function getzona($idparroquia) {
        $this->db->where('ID_PARROQUIA', $idparroquia);
        $this->db->order_by('DESCRIPCION', 'asc');
        $parroquia = $this->db->get('T_ZONA');
        if($parroquia->num_rows() > 0){
            return $parroquia->result();
        }
    }
    public function tecnico() {
        $this->db->order_by('NOMBRE', 'asc');
        $estados = $this->db->get('T_TECNICO');

        if($estados->num_rows() > 0){
            return $estados->result();
        }
    }
}