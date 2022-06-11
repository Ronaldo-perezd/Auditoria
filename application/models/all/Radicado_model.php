<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Radicado_model extends CI_Model
{
    public function listar($id = null)
    {
        $this->db->select('s.*, concat(divipola.divNombre, "-", divipola.divDepartamento) as divipola, estado.estNombre as estado, tipo_persona.tpeNombre as tipo_persona, camara_comercio.camNombre as camara_comercio');
        $this->db->from('empresa s');
        $this->db->join('divipola divipola', 'divipola.divCodigo = s.divCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('tipo_persona tipo_persona', 'tipo_persona.tpeCodigo = s.tpeCodigo');
        $this->db->join('camara_comercio camara_comercio', 'camara_comercio.camCodigo = s.camCodigo');
        $this->db->where('s.estCodigo', 1);

        if($id != null)
        {
            $this->db->where('s.empCodigo', $id);
        }

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function guardar($data)
    {
        return $this->db->insert('empresa', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, concat(divipola.divNombre, "-", divipola.divDepartamento) as divipola, estado.estNombre as estado, tipo_persona.tpeNombre as tipo_persona, camara_comercio.camNombre as camara_comercio');
        $this->db->from('empresa s');
        $this->db->join('divipola divipola', 'divipola.divCodigo = s.divCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('tipo_persona tipo_persona', 'tipo_persona.tpeCodigo = s.tpeCodigo');
        $this->db->join('camara_comercio camara_comercio', 'camara_comercio.camCodigo = s.camCodigo');
        $this->db->where('s.empCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function obtenerxnit($nit)
    {
        $this->db->select('s.*, concat(divipola.divNombre, "-", divipola.divDepartamento) as divipola, estado.estNombre as estado, tipo_persona.tpeNombre as tipo_persona, camara_comercio.camNombre as camara_comercio');
        $this->db->from('empresa s');
        $this->db->join('divipola divipola', 'divipola.divCodigo = s.divCodigo');
        $this->db->join('estado estado', 'estado.estCodigo = s.estCodigo');
        $this->db->join('tipo_persona tipo_persona', 'tipo_persona.tpeCodigo = s.tpeCodigo');
        $this->db->join('camara_comercio camara_comercio', 'camara_comercio.camCodigo = s.camCodigo');
        $this->db->where('s.empNitDoc', $nit);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('empCodigo', $id);
        return $this->db->update('empresa', $data);
    }
}

/* Fin del archivo Radicado_model.php */
