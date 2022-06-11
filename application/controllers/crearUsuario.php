<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class crearUsuario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');

		if(!$this->session->userdata('login'))
		{
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = array();
		$this->template->set('title', 'Inicio');
		$this->load->view('admin/crearUsuario');
	}

	public function GetUsers() //en uso
	{
		$data = array(
			'usuario' => $this->Admin_model->Get_User(),
		);
		//print_r($data);
		$this->template->set('title', 'INFORMES');

		$this->template->load('layout', 'contents' , 'admin/crearUsuario', $data);
	}

	public function almacenarUsuario() 
	{
       	$user = $this->input->post('user');
        $this->form_validation->set_rules('user', 'usuario', 'required|is_unique[usuarios.documento_IT]',array('is_unique' => 'Este correo electrónico ya se encuentra registrado')); 
		$contrasena = $this->input->post('contrasena');
        $this->form_validation->set_rules('contrasena', 'contraseña', 'required');

		if ($this->form_validation->run())
		{
		    $data = array(
				'documento_IT' => $user,
				'contrasena' => $contrasena,
				'status_Pass' => 1,
		    );

		    if($this->Admin_model->Almacena_User($data))
		    {
			    redirect(base_url().'crearUsuario/GetUsers/');
		    }
		    else
		    {
			    $this->session->set_flashdata('error', 'No se pudo guardar la informacion');
			    redirect(base_url().'crearUsuario/GetUsers/');
		    }
		}
		else 
		{
		$this->GetUsers();
		}
	}
}
/* Fin del archivo Login.php */