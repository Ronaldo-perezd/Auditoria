<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Empresa_ciuus_model extends CI_Model
{
    public function listar($id = null)
    {
        $this->db->select('s.*, empresa.empNitDoc as empresa, concat(ciuu.ciuNumero, " - ", ciuu.ciuNombre) as ciuu, estado.estNombre as estado');
        $this->db->from('empresa_ciuus s');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');
        $this->db->join('ciuu ciuu', 'ciuu.ciuCodigo = s.ciuCodigo');
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
        return $this->db->insert('empresa_ciuus', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, empresa.empNitDoc as empresa, concat(ciuu.ciuNumero, " - ", ciuu.ciuNombre) as ciuu, estado.estNombre as estado');
        $this->db->from('empresa_ciuus s');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');
        $this->db->join('ciuu ciuu', 'ciuu.ciuCodigo = s.ciuCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.eciCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('eciCodigo', $id);
        return $this->db->update('empresa_ciuus', $data);
    }
}

/* Fin del archivo Empresa_ciuus_model.php */
