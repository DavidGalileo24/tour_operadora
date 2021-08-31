<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class transporte_model extends CI_Model{
	public function get_transporte(){
		$this->db->select('t.id_transporte,t.placa,t.modelo,t.marca,t.capacidad,e.nombre_empleado,e.apellido_empleado,c.nombre_cargo,l.respuesta,d.nombre_estadoT');
		$this->db->from('transporte t');
		$this->db->join('empleado e' , 't.id_empleado = e.id_empleado');

		$this->db->join('estadoT d' , 'd.id_estadoT = t.id_estadoT');
		$this->db->join('licencia l' , 'l.id_licencia = e.id_licencia');
		$this->db->join('cargo c' , 'c.id_cargo = e.id_cargo');

		$exe = $this->db->get();
		return $exe->result();


	}
	public function eliminar($id){
		$this->db->where('id_transporte',$id);
		$this->db->delete('transporte');
		if ($this->db->affected_rows()> 0) {
			return true;
		}else{
			return false;
		}
	}
	public function set_transporte($datos){
		$this->db->set('id_empleado',$datos['nombre_empleado']);
		
		$this->db->set('marca',$datos['marca']);
		$this->db->set('placa',$datos['placa']);
		$this->db->set('modelo',$datos['modelo']);
		$this->db->set('capacidad',$datos['capacidad']);
		
		$this->db->set('id_estadoT',$datos['nombre_estadoT']);
		
		$this->db->insert('transporte');
		if ($this->db->affected_rows()>0) {
			return "add";
		}
	}
	public function get_empleado(){
		$this->db->select('*');
		$this->db->from('empleado');
		$this->db->where('id_cargo = 3');


		$exe = $this->db->get();
		return $exe->result();

		
	}

	
	public function get_estadoT(){
		$exe = $this->db->get('estadoT');
		return $exe->result();
	
	}
	
	public function get_datos($id){
		$this->db->where('id_transporte', $id);
		$exe = $this->db->get('transporte');
		if($exe->num_rows() > 0){
			return $exe->row();
		}else{
			return false;
		}
	}

	public function actualizar($datos){
	$this->db->set('id_empleado', $datos['nombre_empleado']  );
	$this->db->set('marca', $datos['marca']  );
	$this->db->set('modelo', $datos['modelo']);
	$this->db->set('placa', $datos['placa']  );
	$this->db->set('capacidad', $datos['capacidad']  );
	$this->db->set('id_estadoT',$datos['nombre_estadoT']);
	$this->db->where('id_transporte',$datos['id_transporte']);
	$this->db->update('transporte');


	if ($this->db->affected_rows()>0) {
		return "edi";
	}

	}


}



