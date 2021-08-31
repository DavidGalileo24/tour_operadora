<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class registroReservaM extends CI_Model{
	
	public function readDatos(){
		$this->db->select('rs.id_registro, e.nombre_empleado, e.apellido_empleado, rs.fecha_registro, r.fecha_reserva, r.n_adultos, r.n_ninos, r.residuo, rs.total_pagar, e.nombre_estado');
		$this->db->from('registro_reserva rs');

		$this->db->join('empleado e','e.id_empleado = rs.id_empleado');
		$this->db->join('reservacion r','r.id_empleado = rs.id_empleado');
		$this->db->join('estado e','e.id_estado = rs.id_estado');

		$mks = $this->db->get();
		return $mks->result();
	}
}