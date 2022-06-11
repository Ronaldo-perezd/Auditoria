<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class tipo_empresa_model extends CI_Model
{
    public function listar1($id)
    {

        $this->db->select('s.temCodigo');
        $this->db->from('empresa_tipos s');
        $this->db->where('s.estCodigo', 1);
        $this->db->where('s.empCodigo', $id);
        //$this->db->where('s.temCodigo', 3);

        $resultado = $this->db->get();
        return $resultado->result();

    }

    public function listar($id)
    {
       /* 
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('tipo_empresa s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.estCodigo', 1);
        */
        //$this->db->where_not_in('temCodigo', 3);
        
        
    $sql = "SELECT s.*, estado.estNombre as estado FROM tipo_empresa s JOIN estado estado ON estado.estCodigo = s.estCodigo WHERE s.estCodigo = 1 AND temCodigo NOT IN (SELECT e.temCodigo from empresa_tipos e where e.estCodigo = '1' and e.empCodigo = '$id')";
    //   $resultado = mysql_query($sql, $conexion); 

       $resultado = $this->db->query($sql);
       //$resultado = $this->db->get();
       return $resultado->result();
    }


    public function guardar($data)
    {
        return $this->db->insert('tipo_empresa', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, estado.estNombre as estado');
        $this->db->from('tipo_empresa s');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->where('s.temCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('temCodigo', $id);
        return $this->db->update('tipo_empresa', $data);
    }
}

/* Fin del archivo tipo_Empresa_model.php */
