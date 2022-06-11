<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Etapa_model extends CI_Model
{
    public function listar()
    {
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('etapa s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.estCodigo', 1);

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('etapa', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('etapa s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.etaCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('etaCodigo', $id);
        return $this->db->update('etapa', $data);
    }
}

/* Fin del archivo Etapa_model.php */
