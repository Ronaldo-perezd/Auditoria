<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Divipola_model extends CI_Model
{
    public function listar()
    {
        $this->db->order_by('divDepartamento', 'ASC');
        $this->db->order_by('divNombre', 'ASC');
        $resultado = $this->db->get('divipola');

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('divipola', $data);
    }

    public function obtener($id)
    {
        $this->db->where('divCodigo', $id);

        $resultado = $this->db->get('divipola');

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('divCodigo', $id);
        return $this->db->update('divipola', $data);
    }

    public function obtenerMunicipio($clave)
    {
        $this->db->like('divCodigo', $clave, 'after');
        $resultado = $this->db->get('divipola');

        return $resultado->row();
    }
    
    public function valida_dpto($depto)
    {
        $this->db->where('divDepartamento', $depto);
        $this->db->where('estCodigo', 1);
        $resultado = $this->db->get('divipola');
        return $resultado->row();
    }

    public function valida_mpio($depto,$mpio)
    {
        $this->db->where('divDepartamento', $depto);
        $this->db->where('divNombre', $mpio);
        $this->db->where('estCodigo', 1);
        $resultado = $this->db->get('divipola');
        return $resultado->row();
    }

}

/* Fin del archivo Divipola_model.php */
