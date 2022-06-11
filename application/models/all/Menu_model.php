<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Menu_model extends CI_Model
{
    public function listar()
    {

        $resultado = $this->db->get('menu');

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('menu', $data);
    }

    public function obtener($id)
    {
        $this->db->where('menCodigo', $id);

        $resultado = $this->db->get('menu');

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('menCodigo', $id);
        return $this->db->update('menu', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('menCodigo', $id);
        return $this->db->delete('menu');
    }
}

/* Fin del archivo Menu_model.php */
