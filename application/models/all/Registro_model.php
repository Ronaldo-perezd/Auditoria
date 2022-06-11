<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Registro_model extends CI_Model
{
    public function listar($id = null)
    {
        $this->db->select('s.*, etapa.etaNombre as etapa, empresa.empNitDoc as empresa');
        $this->db->from('registro s');
        $this->db->join('etapa etapa', 'etapa.etaCodigo = s.etaCodigo');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');

        if($id != null)
        {
            $this->db->where('s.empCodigo', $id);
        }


        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('registro', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, etapa.etaNombre as etapa, empresa.empNitDoc as empresa');
        $this->db->from('registro s');
        $this->db->join('etapa etapa', 'etapa.etaCodigo = s.etaCodigo');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');
        $this->db->where('s.regCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('regCodigo', $id);
        return $this->db->update('registro', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('regCodigo', $id);
        return $this->db->delete('registro');
    }
}

/* Fin del archivo Registro_model.php */
