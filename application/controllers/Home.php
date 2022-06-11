<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('login'))
		{
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = array();
		$this->template->set('title', 'Inicio');
		$this->load->view('vacuna/vistaprincipal');
	}

	public function formulario()
	{
		$data = array();
		$this->template->set('title', 'Inicio'); 
		$this->load->view('vacuna/encuesta');
	}

	public function grafica()
	{
		$data = array();
		$this->template->set('title', 'Inicio');
		
		$this->load->view('vacuna/mostrar2');
	}


	public function acerca()
    {
        $data = array();
		$this->template->set('title', 'Acerca');
		$this->template->set('subtitle', 'Home');
        $this->template->load('default_layout', 'contents' , 'home/acerca', $data);
    }
}
/* Fin del archivo Login.php */