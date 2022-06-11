<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Importador_model extends CI_Model
{
    public function guardar($data) 
    {
        return $this->db->insert('importaciones', $data);
    }

    public function guardarPropio($data) 
    {
        return $this->db->insert('impo_propio', $data);
    }

    public function guardarMilitar($data) 
    {
        return $this->db->insert('impo_militar', $data);
    }

    public function guardarPrograma($data) 
    {
        return $this->db->insert('impo_recoleccion', $data);
    }

    public function obtener($id_Gnal)
    {
        $this->db->select('*');
        $this->db->from('importaciones');
        $this->db->where('impCodigo', $id_Gnal);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function obtenerPropio($id_Gnal)
    {
        $this->db->select('*');
        $this->db->from('impo_propio');
        $this->db->where('imppCodigo', $id_Gnal);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function obtenerMilitar($id_Gnal)
    {
        $this->db->select('*');
        $this->db->from('impo_militar');
        $this->db->where('impmCodigo', $id_Gnal);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function obtenerPrograma($id_Gnal)
    {
        $this->db->select('*');
        $this->db->from('impo_recoleccion');
        $this->db->where('imprCodigo', $id_Gnal);
        $this->db->where('estCodigo', 1);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function act_impoGnal($id_Gnal, $data)
    {
        $this->db->where('impCodigo', $id_Gnal);
        return $this->db->update('importaciones', $data);
    }

    public function act_impoPropio($id_Gnal, $data)
    {
        $this->db->where('imppCodigo', $id_Gnal);
        return $this->db->update('impo_propio', $data);
    }

    public function act_impoMilitar($id_Gnal, $data)
    {
        $this->db->where('impmCodigo', $id_Gnal);
        return $this->db->update('impo_militar', $data);
    }

    public function act_impoPrograma($id_Gnal, $data)
    {
        $this->db->where('imprCodigo', $id_Gnal);
        return $this->db->update('impo_recoleccion', $data);
    }

    public function act_impGnal($id, $data)
    {
        
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('impAnnioCreacion',date("Y"));
        return $this->db->update('importaciones', $data);
    }

    public function act_impPropio($id, $data)
    {
        
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('imppAnnioCreacion',date("Y"));
        return $this->db->update('impo_propio', $data);
    }

    public function act_impMilitar($id, $data)
    {
        
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('impmAnnioCreacion',date("Y"));
        return $this->db->update('impo_militar', $data);
    }

    public function act_impPrograma($id, $data)
    {
        
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('imprAnnioCreacion',date("Y"));
        return $this->db->update('impo_recoleccion', $data);
    }

    public function factorImpo($id) 
    {
        $this->db->select('*');
        $this->db->from('importaciones');
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('impFactorAjustePeso is null');
        $this->db->where('impAnnioCreacion',date("Y"));

        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function factorPropio($id)
    {
        $this->db->select('*');
        $this->db->from('impo_propio');
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('imppFactorAjustePeso is null');
        $this->db->where('imppAnnioCreacion',date("Y"));

        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function factorMilitar($id)
    {
        $this->db->select('*');
        $this->db->from('impo_militar');
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('impmFactorAjustePeso is null');
        $this->db->where('impmAnnioCreacion',date("Y"));

        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function listar_impo($id)
    {
        $this->db->select('i.*, pa.posSubpartida, ca.caeNombre, sa.saeNombre, c.cpcNombre');
        $this->db->from('importaciones i ');
        $this->db->join('posicion_arancelaria pa', 'i.posCodigo = pa.posCodigo');
        $this->db->join('lista_aee la', 'i.posCodigo = la.posCodigo');
        $this->db->join('categoria_aee ca', 'la.caeCodigo = ca.caeCodigo');
        $this->db->join('subcategoria_aee sa', 'la.saeCodigo = sa.saeCodigo');
        $this->db->join('cpc c', 'la.cpcCodigo = c.cpcCodigo');
        $this->db->where('i.empCodigo', $id);
        $this->db->where('i.estCodigo', 1);
        $this->db->where('i.impAnnioCreacion',date("Y"));
        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function listar_impoPropio($id)
    {
        $this->db->select('i.*, pa.posSubpartida, ca.caeNombre, sa.saeNombre, c.cpcNombre');
        $this->db->from('impo_propio i ');
        $this->db->join('posicion_arancelaria pa', 'i.posCodigo = pa.posCodigo');
        $this->db->join('lista_aee la', 'i.posCodigo = la.posCodigo');
        $this->db->join('categoria_aee ca', 'la.caeCodigo = ca.caeCodigo');
        $this->db->join('subcategoria_aee sa', 'la.saeCodigo = sa.saeCodigo');
        $this->db->join('cpc c', 'la.cpcCodigo = c.cpcCodigo');
        $this->db->where('i.empCodigo', $id);
        $this->db->where('i.estCodigo', 1);
        $this->db->where('i.imppAnnioCreacion',date("Y"));
        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function listar_impoMilitar($id)
    {
        $this->db->select('i.*, pa.posSubpartida, ca.caeNombre, sa.saeNombre, c.cpcNombre');
        $this->db->from('impo_militar i ');
        $this->db->join('posicion_arancelaria pa', 'i.posCodigo = pa.posCodigo');
        $this->db->join('lista_aee la', 'i.posCodigo = la.posCodigo');
        $this->db->join('categoria_aee ca', 'la.caeCodigo = ca.caeCodigo');
        $this->db->join('subcategoria_aee sa', 'la.saeCodigo = sa.saeCodigo');
        $this->db->join('cpc c', 'la.cpcCodigo = c.cpcCodigo');
        $this->db->where('i.empCodigo', $id);
        $this->db->where('i.estCodigo', 1);
        $this->db->where('i.impmAnnioCreacion',date("Y"));
        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function listar_factor()
    {

        $resultado = $this->db->get('factor_ajuste');

       return $resultado->result();
    }

    public function listar_programa($id)
    {
        $this->db->select('ir.*,p.proTipoPrograma, cp.cobTipoCobertura');
        $this->db->from('impo_recoleccion ir');
        $this->db->join('programa p', 'ir.proCodigo = p.proCodigo');
        $this->db->join('coberturaPrograma cp', 'ir.cobCodigo = cp.cobCodigo');
        $this->db->where('ir.empCodigo', $id);
        $this->db->where('ir.estCodigo', 1);
        $this->db->where('ir.imprAnnioCreacion',date("Y"));
        
        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function listar_prog()
    {
        $this->db->where('estCodigo', 1);
        $resultado = $this->db->get('programa');
        return $resultado->result();
    }

    public function listar_CobProg()
    {
        $this->db->where('estCodigo', 1);
        $resultado = $this->db->get('coberturaPrograma');
        return $resultado->result();
    }

    public function GuardarFactor($data,$idImp3) 
    {

        $this->db->where('impCodigo', $idImp3);
        return $this->db->update('importaciones', $data);
    }

    public function GuardarFactor2($data,$idImp3) 
    {

        $this->db->where('imppCodigo', $idImp3);
        return $this->db->update('impo_propio', $data);
    }

    public function GuardarFactor3($data,$idImp3) 
    {

        $this->db->where('impmCodigo', $idImp3);
        return $this->db->update('impo_militar', $data);
    }

    public function Consulta_Nit($id)
    {
        $this->db->select('*');
        $this->db->from('empresa');
        $this->db->where('empCodigo', $id);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function DatosImpo($id,$posCodigo)
    {
        $this->db->select('*');
        $this->db->from('ImpoSuma');
        $this->db->where('empCodigo', $id);
        $this->db->where('posCodigo', $posCodigo);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function ImpoPropiaMili($id,$posCodigo)
    {
        $this->db->select('*');
        $this->db->from('CantImpoSuma');
        $this->db->where('empCodigo', $id);
        $this->db->where('posCodigo', $posCodigo);

        $resultado = $this->db->get();
        return $resultado->row();
    }

}

/* Fin del archivo Empresa_model.php */
