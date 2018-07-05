<?php
class Instalacion_model extends CI_Model{

	public function mostrar_det_instalacion($buscar){
			$this->db->where('id_instalacion',$buscar);
			$query = $this->db->get('t_det_instalacion');
			if ($query->num_rows()>0) {
			 return $query->result();
			}else{
			return false;
			}
	}


	public function mostrar_det_instalacion_imprimir($id){
			$this->db->where('ID_INSTALACION',$id);
			$query = $this->db->get('T_DET_INSTALACION');
			if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
	}
	public function guardar($id,$fecha,$id_usuario){
		$datos_instalacion = array('id_cliente' =>$id,
							'fecha'=>$fecha,
							'id_usuario' =>$id_usuario);
			$this->db->insert('t_instalacion', $datos_instalacion);
	}
	public function buscar_instalacion_id_cliente($id_cliente, $monto)
		{
			$this->db->select('*');
			$this->db->from('t_instalacion');
			$this->db->where('id_cliente',$id_cliente);
			$this->db->where('monto',$monto);
			$query = $this->db->get();
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}
		public function guardar_det_instalacion($id_instalacion,$equipo,$cantidad){
		$datos_det_instalacion = array('ID_INSTALACION' =>$id_instalacion,
							'DESCRIPCION'=>$equipo,
							'CANTIDAD' =>$cantidad);
			$this->db->insert('T_DET_INSTALACION', $datos_det_instalacion);
		}
		public function actualizar_instalacion($datos_actualizar,$id_instalacion){
			$this->db->where('ID',$id_instalacion);
			 $this->db->update('t_instalacion',$datos_actualizar);
			if ($this->db->affected_rows()<0) {
				return true;
			}else{
				return false;
			}
		}


		public function buscar_instalacion_monto_cero(){

			$this->db->where('monto','0');
			$query = $this->db->get('t_instalacion');
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}
		public function borrar_instalacion_en_cero($id){
			$this->db->delete('t_instalacion',($id));

		}
		public function borrar_det_instalacion($id){
			$this->db->delete('t_det_instalacion',($id));

		}
			public function buscar_instalacion($id){

			$this->db->where('id',$id);
			$query = $this->db->get('t_instalacion');
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}
		public function buscar_direccion($id){

			$this->db->where('id',$id);
			$query = $this->db->get('t_instalacion');
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}
		public function buscar_tecnico($id){
			$this->db->where('id',$id);
			$query = $this->db->get('t_tecnico');
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}
		public function buscar_cliente($id){
			$this->db->where('id',$id);
			$query = $this->db->get('t_cliente');
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}
		public function buscar_zona($id){
			$this->db->where('id',$id);
			$query = $this->db->get('t_zona');
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}
		public function buscar_usuario($id){
			$this->db->where('id',$id);
			$query = $this->db->get('t_usuario');
				if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}
		public function buscar_empresa(){
		$query=$this->db->get('t_empresa');
			if ($query->num_rows()>0) {
				return $query;
				}else{
				return false;
				}
		}
}

