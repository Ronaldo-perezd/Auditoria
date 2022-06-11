<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Scaffolding_model extends CI_Model
{
    public function listarTablas()
    {
        $db = $this->db->database;
        $resultado = $this->db->query("SELECT TABLE_NAME AS TABLAS FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$db."'");

       return $resultado->result();
    }

    public function listarCapos($nombreTabla)
    {
        $db = $this->db->database;
        $resultado = $this->db->query("DESCRIBE ".$nombreTabla);

       return $resultado->result();
    }

    public function listarForaneas($nombreTabla)
    {
        $db = $this->db->database;
        $resultado = $this->db->query("SELECT TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_NAME = '".$nombreTabla."'");

       return $resultado->result();
    }

    public function listarDependientes($nombreTabla)
    {
        $db = $this->db->database;
        $resultado = $this->db->query("SELECT TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_NAME = '".$nombreTabla."'");

       return $resultado->result();
    }
}

/* Fin del archivo Scaffolding_model.php */