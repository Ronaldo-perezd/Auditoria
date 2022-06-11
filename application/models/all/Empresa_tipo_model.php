<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class empresa_tipo_model extends CI_Model
{
    public function listar($id = null)
    {
        $this->db->select('s.*, empresa.empNitDoc as empresa, tipo_empresa.temNombre as tipo_empresa, estado.estNombre as estado');
        $this->db->from('empresa_tipos s');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');
        $this->db->join('tipo_empresa tipo_empresa', 'tipo_empresa.temCodigo = s.temCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.estCodigo', 1);

        if($id != null)
        {
            $this->db->where('s.empCodigo', $id);
        }

        $resultado = $this->db->get();

       return $resultado->result();
    }


    public function guardar($data)
    {
        return $this->db->insert('empresa_tipos', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, empresa.empNitDoc as empresa, tipo_empresa.temNombre as tipo_empresa, estado.estNombre as estado');
        $this->db->from('empresa_tipos s');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');
        $this->db->join('tipo_empresa tipo_empresa', 'tipo_empresa.temCodigo = s.temCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.tieCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('tieCodigo', $id);
        return $this->db->update('empresa_tipos', $data);
    }
}

/* Fin del archivo empresa_tipo_model.php */
