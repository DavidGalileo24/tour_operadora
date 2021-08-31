<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cliente_model extends CI_Model{

	public function get_cliente(){
		$this->db->select('c.id_cliente, c.nombre_cliente , c.apellido_cliente,c.DUI,c.fecha_nac,c.direccion,c.correo,c.telefono');	
		$this->db->from('cliente c');
		$exe = $this->db->get();
		return $exe->result();	
	}
	public function eliminar($id){
		$this->db->where('id_cliente',$id);
		$this->db->delete('cliente');
		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}	
	}
	public function set_clientes($datos){

		$this->db->set('nombre_cliente' ,   $datos['nombre_cliente']);	
		$this->db->set('apellido_cliente',    $datos['apellido_cliente']);	
		$this->db->set('DUI'  ,              $datos['DUI']);	
		$this->db->set('fecha_nac',    $datos['fecha_nac']);	
		$this->db->set('direccion',    $datos['direccion']);	
		$this->db->set('correo'  ,  $datos['correo']);
		$this->db->set('telefono',    $datos['telefono']);	
		$this->db->insert('cliente');


		if ($this->db->affected_rows()> 0) {
			return "add";
		}

	}
	public function get_datos($id){
		$this->db->where('id_cliente', $id);
		$exe = $this->db->get('cliente');
		if ($this->db->affected_rows()> 0) {
			return $exe->row();
		}else{
			return false;
		}
	}
	public function actualizar($datos){
		$this->db->set('nombre_cliente', $datos['nombre_cliente']);
		$this->db->set('apellido_cliente', $datos['apellido_cliente']);
		$this->db->set('DUI', $datos['DUI']);
		$this->db->set('fecha_nac', $datos['fecha_nac']);
		$this->db->set('direccion', $datos['direccion']);
		$this->db->set('correo', $datos['correo']);
		$this->db->set('telefono', $datos['telefono']);
		$this->db->where('id_cliente', $datos['id_cliente']);
		$this->db->update('cliente');
		if($this->db->affected_rows()> 0){
			return "edit";
		}
	}

	public function validarNombre($nombre_cliente){

	$this->db->where('nombre_cliente',$nombre_cliente);
	$this->db->get('cliente');

	if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}
}
}


?>