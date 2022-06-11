<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Tipo_persona_model extends CI_Model
{
    public function listar()
    {
        $this->db->select('s.*, ');
        $this->db->from('tipo_persona s');
        $this->db->where('s.estCodigo', 1);

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('tipo_persona', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, ');
        $this->db->from('tipo_persona s');
        $this->db->where('s.tpeCodigo', 1);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('tpeCodigo', $id);
        return $this->db->update('tipo_persona', $data);
    }
}

/* Fin del archivo Tipo_persona_model.php */
