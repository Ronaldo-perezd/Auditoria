<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin_model extends CI_Model
{

    public function Get_User() //en uso
    { 
        //$this->db = $this->load->database('conexion_2', TRUE);

        $resultado = $this->db->get("usuarios");
        return $resultado->result();
    }

    public function Almacena_User($data) 
    {
        return $this->db->insert('usuarios', $data);
    }



    /*
    public function GetPersona() //en uso
    { 
        $this->db = $this->load->database('conexion_2', TRUE);

        $resultado = $this->db->get("view_TIPO_USU");
        return $resultado->result();
    }*/
}
/* Fin del archivo Usuario_model.php */