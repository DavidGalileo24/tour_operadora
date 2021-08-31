<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class empleado_model extends CI_Model {

	public function get_empleado(){
		$this->db->select('e.id_empleado, e.DUI, e.nombre_empleado, e.apellido_empleado, e.fecha_nac, e.direccion, e.correo, e.telefono, l.respuesta, c.nombre_cargo');
		$this->db->from('empleado e');
		$this->db->join('licencia l','l.id_licencia = e.id_licencia');
		$this->db->join('cargo c','c.id_cargo = e.id_cargo');
		$exe = $this->db->get();
		return $exe->result();
	}

		public function eliminar($id){
		$this->db->where('id_empleado',$id);
		$this->db->delete('empleado');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function get_licencia(){
		$exe = $this->db->get('licencia');
		return $exe->result();
	}

	public function get_cargo(){
		$exe = $this->db->get('cargo');
		return $exe->result();
	}

	public function set_empleado($datos){
		$this->db->set('DUI', $datos["DUI"]);
		$this->db->set('nombre_empleado', $datos["nombre_empleado"]);
		$this->db->set('apellido_empleado', $datos["apellido_empleado"]);
		$this->db->set('fecha_nac', $datos["fecha_nac"]);
		$this->db->set('direccion', $datos["direccion"]);
		$this->db->set('correo', $datos["correo"]);
		$this->db->set('telefono', $datos["telefono"]);
		$this->db->set('id_licencia', $datos["respuesta"]);
		$this->db->set('id_cargo', $datos["nombre_cargo"]);
		$this->db->insert('empleado');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	public function get_datos($id){
		$this->db->where('id_empleado',$id);
		$exe = $this->db->get('empleado');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
		$this->db->set('DUI', $datos["DUI"]);
		$this->db->set('nombre_empleado', $datos["nombre_empleado"]);
		$this->db->set('apellido_empleado', $datos["apellido_empleado"]);
		$this->db->set('fecha_nac', $datos["fecha_nac"]);
		$this->db->set('direccion', $datos["direccion"]);
		$this->db->set('correo', $datos["correo"]);
		$this->db->set('telefono', $datos["telefono"]);
		$this->db->set('id_licencia', $datos["respuesta"]);
		$this->db->set('id_cargo', $datos["nombre_cargo"]);
		$this->db->where('id_empleado',$datos['id_empleado']);
		$this->db->update('empleado');

		if($this->db->affected_rows()>0){
			return "adi";
		}
	}


	public function ajaxDUI(){
		$DUI = $this->input->post('DUI');
		$this->db->where('DUI',$DUI);
		$this->db->get('empleado');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return true;
		}
	}
}