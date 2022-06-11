<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Ciuu_model extends CI_Model
{
    public function listar()
    {
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('ciuu s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.estCodigo', 1);

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('ciuu', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('ciuu s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.ciuCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function obtenerxcodigo($codigo)
    {
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('ciuu s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');

        $this->db->where('s.ciuNumero', $codigo);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('ciuCodigo', $id);
        return $this->db->update('ciuu', $data);
    }
}

/* Fin del archivo Ciuu_model.php */
