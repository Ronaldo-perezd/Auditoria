<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Usuario_model extends CI_Model
{
    public function listar()
    {
        $this->db->select('s.*, estado.estNombre as estado, entidad.entRazon as entidad, rol.rolNombre as rol');
        $this->db->from('usuario s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('entidad entidad', 'entidad.entCodigo = s.entCodigo');
        $this->db->join('rol rol', 'rol.rolCodigo = s.rolCodigo');
        $this->db->where('s.estCodigo', 1);

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('usuario', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, estado.estNombre as estado, entidad.entRazon as entidad, rol.rolNombre as rol');
        $this->db->from('usuario s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('entidad entidad', 'entidad.entCodigo = s.entCodigo');
        $this->db->join('rol rol', 'rol.rolCodigo = s.rolCodigo');
        $this->db->where('s.usuCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('usuCodigo', $id);
        return $this->db->update('usuario', $data);
    }
}

/* Fin del archivo Usuario_model.php */
