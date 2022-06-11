<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Entidad_model extends CI_Model
{
    public function listar()
    {
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('entidad s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.estCodigo', 1);

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('entidad', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('entidad s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.entCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('entCodigo', $id);
        return $this->db->update('entidad', $data);
    }
}

/* Fin del archivo Entidad_model.php */
