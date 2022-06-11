<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Backend_model extends CI_Model
{
    public function getId($link)
    {
        $this->db->where('menLink', $link);
        $resultado = $this->db->get('menu');
         return $resultado->row();
    }

    public function getPermisos($menu, $rol)
    {
        $this->db->where('menCodigo', $menu);
        $this->db->where('rolCodigo', $rol);
        $resultado = $this->db->get('permisos');

        return $resultado->row();
    }
}