<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Bacex_model extends CI_Model
{

    public function info_expo($IdNit)
    {
        $db2 = $this->load->database('sqlserver', TRUE);
        //$db2->select('*','POS_ARA3','CANTIDA3','KILO_NE3','ANNIO','NIT3');

        $result1 = $db2->query("SET ANSI_NULLS ON;");
        $result2 = $db2->query("SET ANSI_WARNINGS ON;"); 

        $db2->select('q.*');
        $db2->from('q_DEX q');
        $db2->join('PA_RPCAEE PA', 'q.POS_ARA3 = pa.posSubpartida');
        $db2->where('q.ID_NIT3', $IdNit);
        $db2->where('q.ANNIO >=' , date("Y")-3);
        $db2->where('q.ANNIO <=' , date("Y")-1);
       // $db2->order_by("q.ANNIO", "asc");

        $resultado = $db2->get();

        //return $resultado->row();
       return $resultado->result();
    }

    public function guardarExpo($datosExpo)
    {
        //return $this->db->insert('bacex_exportaciones', $dataExpo);
        $sql = "CALL insertar_expo($datosExpo)";
        $resultado = $this->db->query($sql);
    }

    public function info_impo($IdNit)
    {
        
        $db2 = $this->load->database('sqlserver', TRUE);
       
        $db2->select('q.*');
        $db2->from('q_DIMP_RAEE_ALL q');
        $db2->join('PA_RPCAEE PA', 'q.NANDINA = pa.posSubpartida');
        $db2->where('q.ID_NITIMPOR',$IdNit);
        $db2->where('q.ANNIO_PRESENTA >=' , date("Y")-3);
        $db2->where('q.ANNIO_PRESENTA <=' , date("Y")-1);
        //$db2->order_by("ANNIO_PRESENTA", "asc");

        $resultado = $db2->get();
        return $resultado->result();
        

         /*
        $sql = "SELECT * FROM q_DIMP WHERE ID_NITIMPOR = $IdNit AND ANNIO_PRESENTA >= ".date("Y")."-3";
        $sql = $sql." AND ANNIO_PRESENTA <= ".date("Y")-1;
        $sql = $sql." ORDER BY ANNIO_PRESENTA ASC";
        $resultado = $db2->query($sql);
        return $resultado->result();
        */
        
    }

    public function guardarImpo($datos)
    {
        //return $this->db->insert('bacex_importaciones', $dataImpo);
        $sqlImpo = "CALL insertar_impo($datos)";
        $resultado = $this->db->query($sqlImpo);
    }

    public function Consulta_IdNit($nit)
    {
        $db2 = $this->load->database('sqlserver', TRUE);

        $db2->select('*'); 
        $db2->from('C_NIT');
        $db2->where('codigo', $nit);

        $resultado = $db2->get();

        return $resultado->row();
       //return $resultado->result();
    }

    public function proc_transformar($nit)
    {
        $sql = "CALL transformar_data($nit)";
        $resultado = $this->db->query($sql);
    }

    /*
    public function proc_expo($nit)
    {
        $sql = "CALL transformar_expo($nit)";
        $resultado = $this->db->query($sql);
    }

    public function proc_impo($Param1,$Param2,$Param3)//no funciona aun 
    {
        $db2 = $this->load->database('sqlserver', TRUE);

        //$sql = "EXEC Proc_Insert_RAEE $datos";
        //$resultado = $db2->query($sql);
        $result = $db2->output('Proc_Insert_RAEE', array($Param1=>1, $Param2=>2, $Param3=>3), 'EXECUTE');
    }
    */
}


/* Fin del archivo Empresa_model.php */
