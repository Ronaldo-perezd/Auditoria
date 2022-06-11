<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Permisos_model extends CI_Model
{
    public function listar()
    {
        $this->db->select('s.*, rol.rolNombre as rol, menu.menNombre as menu');
        $this->db->from('permisos s');
        $this->db->join('rol rol', 'rol.rolCodigo = s.rolCodigo');
        $this->db->join('menu menu', 'menu.menCodigo = s.menCodigo');
        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('permisos', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, rol.rolNombre as rol, menu.menNombre as menu');
        $this->db->from('permisos s');
        $this->db->join('rol rol', 'rol.rolCodigo = s.rolCodigo');
        $this->db->join('menu menu', 'menu.menCodigo = s.menCodigo');
        $this->db->where('s.perCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('perCodigo', $id);
        return $this->db->update('permisos', $data);
    }

    public function eliminar($id)
    {
        $this->db->where('perCodigo', $id);
        return $this->db->delete('permisos');
    }
}

/* Fin del archivo Permisos_model.php */
