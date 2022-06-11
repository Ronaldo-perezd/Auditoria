<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Vacuna_model extends CI_Model
{
    public function guardar($data)
    {
        return $this->db->insert('usuarios', $data);
    }

    public function guardar2($data2)
    {
        $this->db = $this->load->database('conexion_2', TRUE);
        return $this->db->insert('registro_persona', $data2);
    }

    public function guardarNube($data2){
        
        $this->db = $this->load->database('nube', TRUE);

        return $this->db->insert('registro_persona', $data2);      
    }

    public function guardarRemoto($data2){
        
        $this->db = $this->load->database('remotoMike', TRUE);
        return $this->db->insert('registro_persona', $data2);
        
    }

    public function guardar3($data1)
    {
        $this->db = $this->load->database('conexion_dividida', TRUE);
        return $this->db->insert('registro_persona2', $data1);
    }

    public function guardarNube2($data1){
        
        $this->db = $this->load->database('nube', TRUE);

        return $this->db->insert('registro_persona2', $data1);       
    }

    public function guardarRemoto2($data1){
        
        $this->db = $this->load->database('remotoMike2', TRUE);

        return $this->db->insert('registro_persona2', $data1);   
    }
}
/* Fin del archivo Vacuna_model.php */