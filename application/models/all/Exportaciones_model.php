<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Exportaciones_model extends CI_Model
{
    public function guardar($data) 
    {
        return $this->db->insert('exportaciones', $data);
    }

    public function obtener($id_Gnal)
    {
        $this->db->select('*');
        $this->db->from('exportaciones');
        $this->db->where('expCodigo', $id_Gnal);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function act_expoGnal($id_Gnal, $data)
    {
        $this->db->where('expCodigo', $id_Gnal);
        return $this->db->update('exportaciones', $data);
    }

    public function act_expGnal($id, $data)
    {
        
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('expAnnioCreacion',date("Y"));
        return $this->db->update('exportaciones', $data);
    }

    public function listar_expo($id)
    {
        $this->db->select('e.*, pa.posSubpartida, ca.caeNombre, sa.saeNombre, c.cpcNombre');
        $this->db->from('exportaciones e');
        $this->db->join('posicion_arancelaria pa', 'e.posCodigo = pa.posCodigo');
        $this->db->join('lista_aee la', 'e.posCodigo = la.posCodigo');
        $this->db->join('categoria_aee ca', 'la.caeCodigo = ca.caeCodigo');
        $this->db->join('subcategoria_aee sa', 'la.saeCodigo = sa.saeCodigo');
        $this->db->join('cpc c', 'la.cpcCodigo = c.cpcCodigo');
        $this->db->where('e.empCodigo', $id);
        $this->db->where('e.estCodigo', 1);
        $this->db->where('e.expAnnioCreacion',date("Y"));
        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function GuardarFactor7($data,$idImp3) 
    {

        $this->db->where('expCodigo', $idImp3);
        return $this->db->update('exportaciones', $data);
    }

    public function Consulta_Nit($id)
    {
        $this->db->select('*');
        $this->db->from('empresa');
        $this->db->where('empCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }
}

/* Fin del archivo Empresa_model.php */
