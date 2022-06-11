<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Estado_model extends CI_Model
{
    public function listar()
    {

        $resultado = $this->db->get('estado');

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('estado', $data);
    }

    public function obtener($id)
    {
        $this->db->where('estCodigo', $id);

        $resultado = $this->db->get('estado');

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('estCodigo', $id);
        return $this->db->update('estado', $data);
    }
}

/* Fin del archivo Estado_model.php */
