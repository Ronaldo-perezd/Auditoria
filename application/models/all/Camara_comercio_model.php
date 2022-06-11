<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Camara_comercio_model extends CI_Model
{
    public function listar()
    {
        $this->db->select('s.*, estado.estNombre as estado, concat(divipola.divNombre, "-", divipola.divDepartamento)  as divipola');
        $this->db->from('camara_comercio s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('divipola divipola', 'divipola.divCodigo = s.divCodigo');
        $this->db->where('s.estCodigo', 1);

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('camara_comercio', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, estado.estNombre as estado, concat(divipola.divNombre, "-", divipola.divDepartamento)  as divipola');
        $this->db->from('camara_comercio s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('divipola divipola', 'divipola.divCodigo = s.divCodigo');
        $this->db->where('s.camCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('camCodigo', $id);
        return $this->db->update('camara_comercio', $data);
    }
}

/* Fin del archivo Camara_comercio_model.php */
