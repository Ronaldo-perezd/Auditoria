<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Fabricante_model extends CI_Model
{
    public function guardar($data) 
    {
        return $this->db->insert('fabricacion', $data);
    }

    public function guardarPropio($data) 
    {
        return $this->db->insert('fabri_propio', $data);
    }

    public function guardarMilitar($data) 
    {
        return $this->db->insert('fabri_militar', $data);
    }

    public function guardarPrograma($data) 
    {
        return $this->db->insert('fabri_recoleccion', $data);
    }

    public function obtener($id_Gnal)
    {
        $this->db->select('*');
        $this->db->from('fabricacion');
        $this->db->where('fabCodigo', $id_Gnal);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function obtenerPropio($id_Gnal)
    {
        $this->db->select('*');
        $this->db->from('fabri_propio');
        $this->db->where('fabpCodigo', $id_Gnal);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function obtenerMilitar($id_Gnal)
    {
        $this->db->select('*');
        $this->db->from('fabri_militar');
        $this->db->where('fabmCodigo', $id_Gnal);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function obtenerPrograma($id_Gnal)
    {
        $this->db->select('*');
        $this->db->from('fabri_recoleccion');
        $this->db->where('fabrCodigo', $id_Gnal);
        $this->db->where('estCodigo', 1);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function act_fabriGnal($id_Gnal, $data)
    {
        $this->db->where('fabCodigo', $id_Gnal);
        return $this->db->update('fabricacion', $data);
    }

    public function act_fabriPropio($id_Gnal, $data)
    {
        $this->db->where('fabpCodigo', $id_Gnal);
        return $this->db->update('fabri_propio', $data);
    }

    public function act_fabriMilitar($id_Gnal, $data)
    {
        $this->db->where('fabmCodigo', $id_Gnal);
        return $this->db->update('fabri_militar', $data);
    }

    public function act_fabriPrograma($id_Gnal, $data)
    {
        $this->db->where('fabrCodigo', $id_Gnal);
        return $this->db->update('fabri_recoleccion', $data);
    }

    public function act_fabGnal($id, $data)
    {
        
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('fabAnnioCreacion',date("Y"));
        return $this->db->update('fabricacion', $data);
    }

    public function act_fabPropio($id, $data)
    {
        
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('fabpAnnioCreacion',date("Y"));
        return $this->db->update('fabri_propio', $data);
    }

    public function act_fabMilitar($id, $data)
    {
        
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('fabmAnnioCreacion',date("Y"));
        return $this->db->update('fabri_militar', $data);
    }

    public function act_fabPrograma($id, $data)
    {
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('fabrAnnioCreacion',date("Y"));
        return $this->db->update('fabri_recoleccion', $data);
    }

    public function factorFab($id) 
    {
        $this->db->select('*');
        $this->db->from('fabricacion');
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('fabFactorAjustePeso is null');
        $this->db->where('fabAnnioCreacion',date("Y"));

        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function factorPropio($id)
    {
        $this->db->select('*');
        $this->db->from('fabri_propio');
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('fabpFactorAjustePeso is null');
        $this->db->where('fabpAnnioCreacion',date("Y"));

        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function factorMilitar($id)
    {
        $this->db->select('*');
        $this->db->from('fabri_militar');
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('fabmFactorAjustePeso is null');
        $this->db->where('fabmAnnioCreacion',date("Y"));

        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function listar_fabri($id)
    {
        $this->db->select('f.*, pa.posSubpartida, ca.caeNombre, sa.saeNombre, c.cpcNombre');
        $this->db->from('fabricacion f ');
        $this->db->join('posicion_arancelaria pa', 'f.posCodigo = pa.posCodigo');
        $this->db->join('lista_aee la', 'f.posCodigo = la.posCodigo');
        $this->db->join('categoria_aee ca', 'la.caeCodigo = ca.caeCodigo');
        $this->db->join('subcategoria_aee sa', 'la.saeCodigo = sa.saeCodigo');
        $this->db->join('cpc c', 'la.cpcCodigo = c.cpcCodigo');
        $this->db->where('f.empCodigo', $id);
        $this->db->where('f.estCodigo', 1);
        $this->db->where('f.fabAnnioCreacion',date("Y"));
        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function listar_fabriPropio($id)
    {
        $this->db->select('f.*, pa.posSubpartida, ca.caeNombre, sa.saeNombre, c.cpcNombre');
        $this->db->from('fabri_propio f ');
        $this->db->join('posicion_arancelaria pa', 'f.posCodigo = pa.posCodigo');
        $this->db->join('lista_aee la', 'f.posCodigo = la.posCodigo');
        $this->db->join('categoria_aee ca', 'la.caeCodigo = ca.caeCodigo');
        $this->db->join('subcategoria_aee sa', 'la.saeCodigo = sa.saeCodigo');
        $this->db->join('cpc c', 'la.cpcCodigo = c.cpcCodigo');
        $this->db->where('f.empCodigo', $id);
        $this->db->where('f.estCodigo', 1);
        $this->db->where('f.fabpAnnioCreacion',date("Y"));
        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function listar_fabriMilitar($id)
    {
        $this->db->select('f.*, pa.posSubpartida, ca.caeNombre, sa.saeNombre, c.cpcNombre');
        $this->db->from('fabri_militar f ');
        $this->db->join('posicion_arancelaria pa', 'f.posCodigo = pa.posCodigo');
        $this->db->join('lista_aee la', 'f.posCodigo = la.posCodigo');
        $this->db->join('categoria_aee ca', 'la.caeCodigo = ca.caeCodigo');
        $this->db->join('subcategoria_aee sa', 'la.saeCodigo = sa.saeCodigo');
        $this->db->join('cpc c', 'la.cpcCodigo = c.cpcCodigo');
        $this->db->where('f.empCodigo', $id);
        $this->db->where('f.estCodigo', 1);
        $this->db->where('f.fabmAnnioCreacion',date("Y"));
        $resultado = $this->db->get();

       return $resultado->result();
    }

    public function listar_programa($id)
    {
        $this->db->select('fr.*,p.proTipoPrograma, cp.cobTipoCobertura');
        $this->db->from('fabri_recoleccion fr');
        $this->db->join('programa p', 'fr.proCodigo = p.proCodigo');
        $this->db->join('coberturaPrograma cp', 'fr.cobCodigo = cp.cobCodigo');
        $this->db->where('fr.empCodigo', $id);
        $this->db->where('fr.estCodigo', 1);
        $this->db->where('fr.fabrAnnioCreacion',date("Y"));
        
        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function GuardarFactor4($data,$idImp3) 
    {

        $this->db->where('fabCodigo', $idImp3);
        return $this->db->update('fabricacion', $data);
    }

    public function GuardarFactor5($data,$idImp3) 
    {

        $this->db->where('fabpCodigo', $idImp3);
        return $this->db->update('fabri_propio', $data);
    }

    public function GuardarFactor6($data,$idImp3) 
    {

        $this->db->where('fabmCodigo', $idImp3);
        return $this->db->update('fabri_militar', $data);
    }

    public function Consulta_Nit($id)
    {
        $this->db->select('*');
        $this->db->from('empresa');
        $this->db->where('empCodigo', $id);

        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function DatosFabri($id,$posCodigo)
    {
        $this->db->select('*');
        $this->db->from('FabriSuma');
        $this->db->where('empCodigo', $id);
        $this->db->where('posCodigo', $posCodigo);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function FabPropiaMili($id,$posCodigo)
    {
        $this->db->select('*');
        $this->db->from('CantFabriSuma');
        $this->db->where('empCodigo', $id);
        $this->db->where('posCodigo', $posCodigo);

        $resultado = $this->db->get();
        return $resultado->row();
    }
}

/* Fin del archivo Empresa_model.php */
