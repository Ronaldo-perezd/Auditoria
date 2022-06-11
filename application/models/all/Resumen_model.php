<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Resumen_model extends CI_Model
{

    public function listarResumen($idEmp,$anioReferencia)
    {
        //set $idEmp = 15;
        //set DATE(Y) = 2019;

        $sql = "select pa.posSubpartida, t1.* from ";
        $sql = $sql."(select la.posCodigo, ca.caeNombre, sa.saeNombre, ";
        $sql = $sql."(select (sum(i.impPesoNeto_1) + sum(i.impPesoNeto_2) + sum(i.impPesoNeto_3))/3 from importaciones i where i.posCodigo = la.posCodigo and i.estCodigo = 1 and i.empCodigo = ".$idEmp." and i.impAnnioCreacion = ".$anioReferencia."  GROUP BY i.posCodigo) as PesoPromImpo, ";
        $sql = $sql."(select (sum(e.expPesoNeto_1) + sum(e.expPesoNeto_2) + sum(e.expPesoNeto_3))/3 from exportaciones e where e.posCodigo = la.posCodigo  and e.estCodigo = 1 and e.empCodigo = ".$idEmp." and e.expAnnioCreacion = ".$anioReferencia."  GROUP BY e.posCodigo) as PesoPromExpo, ";
        $sql = $sql."(select (sum(f.fabPesoNeto_1) + sum(f.fabPesoNeto_2) + sum(f.fabPesoNeto_3))/3 from fabricacion f where f.posCodigo = la.posCodigo  and f.estCodigo = 1 and f.empCodigo = ".$idEmp." and f.fabAnnioCreacion = ".$anioReferencia."  GROUP BY f.posCodigo) as PesoPromFabri, ";
        $sql = $sql."(select (sum(ip.imppPesoNeto_1) + sum(ip.imppPesoNeto_2) + sum(ip.imppPesoNeto_3))/3 from (select * from impo_propio union all select * from fabri_propio) ip where ip.posCodigo = la.posCodigo  and ip.estCodigo = 1 and ip.empCodigo = ".$idEmp." and ip.imppAnnioCreacion = ".$anioReferencia."  GROUP BY ip.posCodigo) as PesoPromPropio, ";
        $sql = $sql."(select (sum(im.impmPesoNeto_1) + sum(im.impmPesoNeto_2) + sum(im.impmPesoNeto_3))/3 from (select * from impo_militar union all select * from fabri_militar) im where im.posCodigo = la.posCodigo  and im.estCodigo = 1 and im.empCodigo = ".$idEmp." and im.impmAnnioCreacion = ".$anioReferencia."  GROUP BY im.posCodigo) as PesoPromMilitar ";
        $sql = $sql."from lista_aee la ";
        $sql = $sql."JOIN categoria_aee ca on (la.caeCodigo = ca.caeCodigo) ";
        $sql = $sql."JOIN subcategoria_aee sa on (la.saeCodigo = sa.saeCodigo) ";
        $sql = $sql."GROUP BY la.posCodigo, ca.caeNombre, sa.saeNombre) t1 ";
        $sql = $sql."join posicion_arancelaria pa on (t1.posCodigo = pa.posCodigo) ";
        $sql = $sql."where (PesoPromImpo is NOT NULL OR PesoPromExpo is NOT NULL or PesoPromFabri is NOT NULL or PesoPromPropio is NOT NULL or PesoPromMilitar is NOT NULL); ";
        
        /*      
        $sql = "SELECT * FROM q_DIMP WHERE ID_NITIMPOR = $IdNit AND ANNIO_PRESENTA >= ".date("Y")."-3";
        $sql = $sql." AND ANNIO_PRESENTA <= ".date("Y")-1;
        $sql = $sql." ORDER BY ANNIO_PRESENTA ASC";
        */        
        $resultado = $this->db->query($sql);
        return $resultado->result();

    }

    public function listarResumen2($idEmp)
    {
        
        $this->db->select('*');
        $this->db->from('q_res_com_total');
        $this->db->where('empCodigo',$idEmp);

        $resultado = $this->db->get();
        return $resultado->result();

    }

}

/* Fin del archivo Resumen_model.php */
