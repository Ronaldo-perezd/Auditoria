<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Empresa_representantes_model extends CI_Model
{
    public function listar($id = null)
    {
        $this->db->select('s.*, tipo_documento.tidNombre as tipo_documento, estado.estNombre as estado, empresa.empNitDoc as empresa');
        $this->db->from('empresa_representantes s');
        $this->db->join('tipo_documento tipo_documento', 'tipo_documento.tidCodigo = s.tidCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');
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
        return $this->db->insert('empresa_representantes', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, tipo_documento.tidNombre as tipo_documento, estado.estNombre as estado, empresa.empNitDoc as empresa');
        $this->db->from('empresa_representantes s');
        $this->db->join('tipo_documento tipo_documento', 'tipo_documento.tidCodigo = s.tidCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');
        $this->db->where('s.ereCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('ereCodigo', $id);
        return $this->db->update('empresa_representantes', $data);
    }
}

/* Fin del archivo Empresa_representantes_model.php */
