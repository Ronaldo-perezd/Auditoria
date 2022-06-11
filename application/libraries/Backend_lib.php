<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_lib
{
    private $CI;
    
    public function __construct()
    {
        $this->CI = & get_instance();
    }

    public function control()
    {
        if(!$this->CI->session->userdata('login'))
        {
            redirect(base_url());
        }

        $url = $this->CI->uri->segment(1);

        if($this->CI->uri->segment(2))
        {
            $accion = strtolower($this->CI->uri->segment(2));
        }
        else
        {
            $accion = 'index';
        }

        $infoMenu = $this->CI->Backend_model->getId($url);

        $permisos =  $this->CI->Backend_model->getPermisos($infoMenu->menCodigo, $this->CI->session->userdata("idRol"));

        if($accion == 'agregar' && $permisos->perInsert == 0)
        {
            redirect(base_url(). "home");
        }
        if($accion == 'editar' && $permisos->perUpdate == 0)
        {
            redirect(base_url(). "home");
        }
        if($accion == 'eliminar' && $permisos->perDelete == 0)
        {
            redirect(base_url(). "home");
        }
        if($accion == 'ver' && $permisos->perDetail == 0)
        {
            redirect(base_url(). "home");
        }
        if($accion == 'index' && $permisos->perRead == 0)
        {
            redirect(base_url(). "home");
        } 

        return $permisos;
    }

    public function perfiles()
    {
        if(!$this->CI->session->userdata('login'))
        {
            redirect(base_url());
        }
        
        $p1 = $this->CI->Backend_model->GetPerfImpo($this->CI->session->userdata('codigo'));
		$p2 = $this->CI->Backend_model->GetPerfComer($this->CI->session->userdata('codigo'));
		$p3 = $this->CI->Backend_model->GetPerfFabri($this->CI->session->userdata('codigo'));
        
        if (empty($p1->temCodigo)) {$Perf1 = 0;} else {$Perf1 = $p1->temCodigo;}
        if (empty($p2->temCodigo)) {$Perf2 = 0;} else {$Perf2 = $p2->temCodigo;}
        if (empty($p3->temCodigo)) {$Perf3 = 0;} else {$Perf3 = $p3->temCodigo;}
        

        $data = array(
            'PerImp'=> $Perf1,
            'PerCom'=> $Perf2,
            'PerFab'=> $Perf3,
        );
        return $data;


    }
}