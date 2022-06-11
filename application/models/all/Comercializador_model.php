<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Comercializador_model extends CI_Model
{
    
    Public function listar($id)
    {
        $this->db->select('*');
        $this->db->from('empresa_sedes');
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo',1);
        $this->db->where('eseTipoSede','A');
        
        $resultado = $this->db->get();

       return $resultado->result();
    }

    Public function listar2($id)
    {
        $this->db->select('*');
        $this->db->from('empresa_sedes');
        $this->db->where('empCodigo',$id);
        $this->db->where('estCodigo',1);
        $this->db->where('eseTipoSede','A');
        $this->db->where('eseValidado','T');
        
        $resultado = $this->db->get();

       return $resultado->result();
    }

    Public function ObtenerComRaee($id)
    {
        $this->db->select('c.*, ca.caeNombre, sa.saeNombre, es.eseNombreSede, rr.recNombre');
        $this->db->from('comercial_AEE c');
        $this->db->join('categoria_aee ca','ca.caeCodigo = c.caeCodigo');
        $this->db->join('subcategoria_aee sa','sa.saeCodigo = c.saeCodigo');
        $this->db->join('empresa_sedes es','es.eseCodigo = c.eseCodigo');
        $this->db->join('recibeRAEE rr','rr.recCodigo = c.recCodigo');
        $this->db->where('c.estCodigo', 1);
        $this->db->where('c.empCodigo', $id);
        
        $resultado = $this->db->get();

       return $resultado->result();
    }
    
    Public function ObtenerComTipoRaee($id)
    {
        $this->db->select('c.*, ca.caeNombre, sa.saeNombre, es.eseNombreSede');
        $this->db->from('com_tipo_raee c');
        $this->db->join('categoria_aee ca','ca.caeCodigo = c.caeCodigo');
        $this->db->join('subcategoria_aee sa','sa.saeCodigo = c.saeCodigo');
        $this->db->join('empresa_sedes es','es.eseCodigo = c.eseCodigo');
        $this->db->where('c.estCodigo', 1);
        $this->db->where('c.empCodigo', $id);
        
        $resultado = $this->db->get();

       return $resultado->result();
    }

    Public function ObtComRaee($id)
    {	
        $this->db->select('*');
        $this->db->from('comercial_AEE');
        $this->db->where('comCodigo',$id);
        
        $resultado = $this->db->get();

       return $resultado->row();
    }

    Public function ObtTipoRaee($id)
    {	
        $this->db->select('*');
        $this->db->from('com_tipo_raee');
        $this->db->where('comtCodigo',$id);
        
        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function listarComRaee($id = null) //validar uso
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

    Public function ObtenerCat()
    {
        $this->db->select('*');
        $this->db->from('categoria_aee');
        
        
        $resultado = $this->db->get();

       return $resultado->result();
    }
    
    Public function ObtenerSubCat()
    {
        $this->db->select('*');
        $this->db->from('subcategoria_aee');
        
        $resultado = $this->db->get();

       return $resultado->result();
    }

    Public function ObtenerSubCat2($Id_Cat) //en construcción
    {
        $this->db->select('*');
        $this->db->from('subcategoria_aee');
        $this->db->where('caeCodigo',$Id_Cat);
        $resultado = $this->db->get();

        $output = '<option value="">select state</option>'; 
        foreach($resultado->result() as $row)
        {
            $output .= '<option value="'.$row->saeCodigo.'">'.$row->saeNombre.'</option>';
        }
        return $output;
    }

    Public function ObtenerRecRaee()
    {
        $this->db->select('*');
        $this->db->from('recibeRAEE');
        
        $resultado = $this->db->get();
        return $resultado->result();
    }

    Public function ObtMecanismoRaee()
    {
        $this->db->select('*');
        $this->db->from('mecanismoRAEE');
        
        $resultado = $this->db->get();
        return $resultado->result();
    }

    public function act_TipoRaee($id, $data) 
    {
        $this->db->where('comtCodigo', $id);
        return $this->db->update('com_tipo_raee', $data);
    }

    public function act_ComRaee($id, $data) 
    {
        $this->db->where('comCodigo', $id);
        return $this->db->update('comercial_AEE', $data);
    }

    public function insert_Tipo_Raee($id) 
    {
        $sql = "INSERT INTO com_tipo_raee(empCodigo,eseCodigo,caeCodigo,saeCodigo,estCodigo,comtValidado,comtUsuarioCreacion,comtAnnioCreacion) ";
        $sql = $sql."select empCodigo,eseCodigo,caeCodigo,saeCodigo,estCodigo,comValidado,comUsuarioCreacion,comAnnioCreacion from comercial_AEE ";
        $sql = $sql."where comCodigo = ".$id;
        $sql = $sql." and recCodigo = 1";

        $resultado = $this->db->query($sql);
        return $resultado;

    }
    
    public function guardar($data)
    {
        return $this->db->insert('comercial_AEE', $data);
    }

    public function actAll_Raee($id, $data)
    {
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('comAnnioCreacion',date("Y"));
        $this->db->where('comValidado','F');
        return $this->db->update('comercial_AEE', $data);
    }

    public function insertAll_Tipo_Raee($id)
    {
  
        $sql = "INSERT INTO com_tipo_raee(empCodigo,eseCodigo,caeCodigo,saeCodigo,estCodigo,comtValidado,comtUsuarioCreacion,comtAnnioCreacion) ";
        $sql = $sql."select empCodigo,eseCodigo,caeCodigo,saeCodigo,estCodigo,comValidado,comUsuarioCreacion,comAnnioCreacion from comercial_AEE ";
        $sql = $sql."where empCodigo = ".$id;
        $sql = $sql." and recCodigo = 1 and estCodigo = 1 and comValidado = 'F'";
        $sql = $sql." and comAnnioCreacion = ".date("Y");

        $resultado = $this->db->query($sql);
        return $resultado;
    }

    public function act_ComTipoRaee($id, $data) 
    {
        $this->db->where('comtCodigo', $id);
        return $this->db->update('com_tipo_raee', $data);
    }

    public function actAll_TipoRaee($id, $data)
    {
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('comtAnnioCreacion',date("Y"));
        $this->db->where('comtValidado','F');
        return $this->db->update('com_tipo_raee', $data);
    }

    public function valida_sede($CodEmpresa,$sede)
    {
        $this->db->where('eseNombreSede', $sede);
        $this->db->where('empCodigo', $CodEmpresa);
        $this->db->where('eseValidado', 'T');
        $this->db->where('estCodigo', 1);
        $resultado = $this->db->get('empresa_sedes');
        return $resultado->row();
    }

    public function valida_cat($Cat)
    {
        $this->db->where('caeNombre', $Cat);
        $this->db->where('estCodigo', 1);
        $resultado = $this->db->get('categoria_aee');
        return $resultado->row();
    }

    public function valida_subcat($CaeCod,$SubCat)
    {
        $this->db->where('saeNombre', $SubCat);
        $this->db->where('caeCodigo', $CaeCod);
        $this->db->where('estCodigo', 1);
        $resultado = $this->db->get('subcategoria_aee');
        return $resultado->row();
    }

    public function valida_recibeRAEE($RecRAEE)
    {
        $this->db->where('recNombre', $RecRAEE);
        $this->db->where('estCodigo', 1);
        $resultado = $this->db->get('recibeRAEE');
        return $resultado->row();
    }

    public function ValidaTipoRaee($id) 
    {
        $this->db->select('*');
        $this->db->from('com_tipo_raee');
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('comtTipoMecanismo is null');
        $this->db->where('comtAnnioCreacion',date("Y"));

        $resultado = $this->db->get();
        return $resultado->result();
    }

    /*
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
    */

}

/* Fin del archivo Empresa_model.php */
