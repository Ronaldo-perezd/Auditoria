<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Posicion_model extends CI_Model
{
    public function listar()
    {
        $this->db->select('pa.*');
        $this->db->from('posicion_arancelaria pa');
        $this->db->join('lista_aee la','la.posCodigo = pa.posCodigo');
        $this->db->where('pa.estCodigo', 1);

        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function listarPA($id)
    {
        $this->db->select('pa.*');
        $this->db->from('posicion_arancelaria pa');
        $this->db->join('importaciones i','pa.posCodigo = i.posCodigo');
        $this->db->where('i.estCodigo', 1);
        $this->db->where('i.empCodigo', $id);
        $this->db->where('i.impValidado', "T");
        $this->db->distinct();
        $this->db->order_by('pa.posCodigo', 'ASC');

        $resultado = $this->db->get();
        return $resultado->result();

    }

    public function listarPAfab($id)
    {
        $this->db->select('pa.*');
        $this->db->from('posicion_arancelaria pa');
        $this->db->join('fabricacion f','pa.posCodigo = f.posCodigo');
        $this->db->where('f.estCodigo', 1);
        $this->db->where('f.empCodigo', $id);
        $this->db->where('f.fabValidado', "T");
        $this->db->distinct();
        $this->db->order_by('pa.posCodigo', 'ASC');

        $resultado = $this->db->get();
        return $resultado->result();

    }

    /*NO SON NECESARIOS AUN */
    /*
    public function guardar($data)
    {
        return $this->db->insert('tipo_persona', $data);
    }

    public function obtener($id)
    {
        $this->db->select('s.*, ');
        $this->db->from('tipo_persona s');
        $this->db->where('s.tpeCodigo', 1);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function actualizar($id, $data)
    {
        $this->db->where('tpeCodigo', $id);
        return $this->db->update('tipo_persona', $data);
    }
    */
}

/* Fin del archivo Posicion_model.php */
