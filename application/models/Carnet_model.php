<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Carnet_model extends CI_Model
{

    public function GetFabricante() //en uso
    { 
        $this->db = $this->load->database('conexion_2', TRUE);

        $resultado = $this->db->get("view_fabricante2");
        return $resultado->result();
    }

    public function GetPersona() //en uso
    { 
        $this->db = $this->load->database('conexion_2', TRUE);

        $resultado = $this->db->get("view_TIPO_USU");
        return $resultado->result();
    }
}
/* Fin del archivo Usuario_model.php */