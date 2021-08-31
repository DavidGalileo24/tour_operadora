<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reserva_model extends CI_Model {

	public function leer(){
		

		$snk = $this->db->query('call reservacion_sp()');
		return $snk->result();

	}

	public function llenarempleado(){
		$snk = $this->db->query('call sp_ejecutivos()');
		return $snk->result();
	}
	public function llenardestino(){
		$this->db->select('ac.id_asignacion,d.nombre_destino,ac.fecha_salida');
		$this->db->from('asignacion_calendario ac');
		$this->db->join('establecimiento_destino exd','exd.id_exd = ac.id_exd');
		$this->db->join('destino d','d.id_destino = exd.id_destino');

		$snk = $this->db->get();
		return $snk->result();

	}

	public function llenarcliente(){
		$snk = $this->db->get('cliente');
		return $snk->result();
	}
	public function llenarestado(){
		$snk = $this->db->get('estado');
		return $snk->result();
	}

	//delete
	public function eliminar($id){
		$this->db->where('id_reservacion',$id);
		$this->db->delete('reservacion');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function insertar($datos){
		$this->db->set('fecha_reserva', $datos["fecha_reserva"]);
		$this->db->set('id_empleado', $datos["nombre_empleado"]);
		$this->db->set('id_asignacion', $datos["nombre_destino"]);
		//$this->db->set('fecha_salida', $datos["fecha_salida"]);
		$this->db->set('id_cliente', $datos["nombre_cliente"]);
		$this->db->set('n_adultos', $datos["n_adultos"]);
		$this->db->set('n_ninos', $datos["n_ninos"]);
		$this->db->set('total_pagar', $datos["total_pagar"]);
		$this->db->set('abono', $datos["abono"]);
		$this->db->set('residuo', $datos["residuo"]);
		$this->db->set('id_estado', $datos["nombre_estado"]);

		$this->db->insert('reservacion');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	public function cargarID($id){
		$this->db->where('id_reservacion',$id);
		$snk = $this->db->get('reservacion');

		if($snk->num_rows()>0){
			return $snk->row();
		}else{
			return false;
		}
	}


	public function actualizar($datos){
		$this->db->set('fecha_reserva', $datos["fecha_reserva"]);
		$this->db->set('id_empleado', $datos["nombre_empleado"]);
		$this->db->set('id_asignacion', $datos["nombre_destino"]);
		//$this->db->set('fecha_salida', $datos["fecha_salida"]);
		$this->db->set('id_cliente', $datos["nombre_cliente"]);
		$this->db->set('n_adultos', $datos["n_adultos"]);
		$this->db->set('n_ninos', $datos["n_ninos"]);
		$this->db->set('total_pagar', $datos["total_pagar"]);
		$this->db->set('abono', $datos["abono"]);
		$this->db->set('residuo', $datos["residuo"]);
		$this->db->set('id_estado', $datos["nombre_estado"]);
		$this->db->where('id_reservacion', $datos["id_reservacion"]);

		$this->db->update('reservacion');


		if($this->db->affected_rows()>0){
			return "edi";
		}else if($this->db->affected_rows() == 0) {
			return "dont";
		}
	}

	




}
?>