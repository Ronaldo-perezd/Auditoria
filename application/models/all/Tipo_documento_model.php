<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Tipo_documento_model extends CI_Model
{
    public function listar()
    {
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('tipo_documento s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.estCodigo', 1);

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('tipo_documento', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('tipo_documento s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.tidCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('tidCodigo', $id);
        return $this->db->update('tipo_documento', $data);
    }
}

/* Fin del archivo Tipo_documento_model.php */
