<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class destino_model extends CI_Model{
//-------------------------------function get destino--------------------------------------------//
	public function get_destino(){
		$this->db->select('d.id_destino,d.nombre_destino,d.descripcion,dp.nombre_departamento,d.direccion,c.nombre_categoria');
		$this->db->from('destino d');
		$this->db->join('departamentos dp','dp.id_departamento = d.id_departamento');
		$this->db->join('categoria c','c.id_categoria = d.id_categoria');
		$exe = $this->db->get();

		return $exe->result();
	}
//-------------------------------fin function get destino----------------------------------------//
	public function eliminar($id){
		$k = "CALL delete_destino_sp(?)";
		$f = array('id_empleado' => $id);
		$this->db->query($k, $f); 

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
//-------------------------------function set destino--------------------------------------------//
	public function set_destino($datos){
		$this->db->set('nombre_destino',$datos['nombre_destino']);
		$this->db->set('id_categoria',$datos['categoria']);
		$this->db->set('descripcion',$datos['descripcion']);
		$this->db->set('id_departamento',$datos['departamento']);
		$this->db->set('direccion',$datos['direccion']);

		$this->db->insert('destino');
		if ($this->db->affected_rows() > 0) {
			return "add";
		}else if ($this->db->affected_rows()== 0) {
			return "dont";
	}
}
//-------------------------------fin function set destino----------------------------------------//

//-------------------------------function mostrar datos de la db de los select------------------------------//
	public function get_categoria(){
		$exe = $this->db->get('categoria');
		return $exe->result();
	}
	public function get_departamento(){
		$exe = $this->db->get('departamentos');
		return $exe->result();
	}
//-------------------------------fin function mostrar datos de la db de los select--------------------------//
	public function get_datos($id){
		$this->db->where('id_destino',$id);
		$exe = $this->db->get('destino');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}
	public function actualizar($datos){
		$this->db->set('nombre_destino',$datos['nombre_destino']);
		$this->db->set('id_categoria',$datos['categoria']);
		$this->db->set('descripcion',$datos['descripcion']);
		$this->db->set('id_departamento',$datos['departamento']);
		$this->db->set('direccion',$datos['direccion']);
		$this->db->where('id_destino',$datos['id_destino']);
		$this->db->update('destino');

		if($this->db->affected_rows()>0){
			return "edit";
		}
	}
}