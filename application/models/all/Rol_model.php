<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Rol_model extends CI_Model
{
    public function listar()
    {

        $resultado = $this->db->get('rol');

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('rol', $data);
    }

    public function obtener($id)
    {
        $this->db->where('rolCodigo', $id);

        $resultado = $this->db->get('rol');

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('rolCodigo', $id);
        return $this->db->update('rol', $data);
    }
}

/* Fin del archivo Rol_model.php */
