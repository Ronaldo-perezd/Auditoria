<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Empresa_sedes_model extends CI_Model
{
    public function listar($id = null) //para el registro
    {
        $this->db->select('s.*, concat(divipola.divNombre, "-", divipola.divDepartamento) as divipola, estado.estNombre as estado, empresa.empNitDoc as empresa');
        $this->db->from('empresa_sedes s');
        $this->db->join('divipola divipola', 'divipola.divCodigo = s.divCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');
        $this->db->where('s.estCodigo', 1);
        $this->db->order_by('s.eseTipoSede', 'DESC');
        

        if($id != null)
        {
            $this->db->where('s.empCodigo', $id);
        }

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function listarPpal($id = null)//ajustada y usada desde c_empresa_sedes
    {
        $this->db->select('s.*, concat(divipola.divNombre, "-", divipola.divDepartamento) as divipola, estado.estNombre as estado, empresa.empNitDoc as empresa');
        $this->db->from('empresa_sedes s');
        $this->db->join('divipola divipola', 'divipola.divCodigo = s.divCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');
        $this->db->where('s.estCodigo', 1);
        $this->db->where('s.eseTipoSede', 'P');

        if($id != null)
        {
            $this->db->where('s.empCodigo', $id);
        }

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function listarAlt($id = null)//ajustada y usada desde c_comercializador
    {
        $this->db->select('es.*, d.divDepartamento, d.divNombre');
        $this->db->from('empresa_sedes es');
        $this->db->join('divipola d', 'd.divCodigo = es.divCodigo');
        $this->db->where('es.estCodigo', 1);
        $this->db->where('es.eseTipoSede', 'A');

        if($id != null)
        {
            $this->db->where('es.empCodigo', $id);
        }

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('empresa_sedes', $data);
    }

    public function obtener($id)//en uso
    {
        $this->db->select('s.*, concat(divipola.divNombre, "-", divipola.divDepartamento) as divipola, estado.estNombre as estado, empresa.empNitDoc as empresa');
        $this->db->from('empresa_sedes s');
        $this->db->join('divipola divipola', 'divipola.divCodigo = s.divCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('empresa empresa', 'empresa.empCodigo = s.empCodigo');
        $this->db->where('s.eseCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data) //transversal 
    {
        $this->db->where('eseCodigo', $id);
        return $this->db->update('empresa_sedes', $data);
    }

    public function act_SedeAlt($id_Gnal, $data)
    {
        $this->db->where('eseCodigo', $id_Gnal);
        return $this->db->update('empresa_sedes', $data);
    }

    public function actAll_SedeAlt($id, $data)
    {
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('eseAnnioCreacion',date("Y"));
        $this->db->where('eseTipoSede','A');
        $this->db->where('eseValidado','F');
        return $this->db->update('empresa_sedes', $data);
    }

}

/* Fin del archivo Empresa_sedes_model.php */
