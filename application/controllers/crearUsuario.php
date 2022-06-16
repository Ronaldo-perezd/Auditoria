<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class crearUsuario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Login_model');

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
				'contrasena' => md5($contrasena),
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


 	public function CambiarContrasena()
    {
    	$passwordAnt = $this->input->post('passwordAnt');
        $this->form_validation->set_rules('passwordAnt', 'contraseña', 'required');
        
        $passwordNew = $this->input->post('passwordNew');
        $this->form_validation->set_rules('passwordNew', 'contraseña', 'required');

        //$this->form_validation->set_rules('passwordNew', 'Nueva Contraseña', 'required|alpha_numeric|matches[passwordConf]|min_length[8]', array('matches' => 'Las contraseñas no coinciden'));

		$passwordConf = $this->input->post('passwordConf');
        $this->form_validation->set_rules('passwordConf', 'contraseña', 'required');

       	//$this->form_validation->set_rules('passwordConf', 'Confirmar Nueva Contraseña', 'required|alpha_numeric|matches[passwordNew]|min_length[8]',array('matches' => 'Las contraseñas no coinciden'));

       /*	echo $passwordAnt;
       	echo $passwordNew;
       	echo $passwordConf;
		*/

		$user = $this->session->userdata('documento_IT');  

		if ($this->form_validation->run())
		{
        	$resEmpresa = $this->Login_model->LoginEmpresa($user, $passwordAnt);
			if(!$resEmpresa)
			{
				$this->session->set_flashdata('error', 'La contraseña Actual es Incorrecta');
				redirect(base_url());
			}
			else 
			{	
				$data2 = array(
				'contrasena' => md5($passwordConf),
				'status_Pass' => 2,
				);

				if($this->Login_model->CambiarClave($data2))
			    {
				    $this->session->set_flashdata('error', 'La contraseña Ha sido actualizada');
				    redirect(base_url().'home');
			    }
			    else
			    {
				    $this->session->set_flashdata('error', 'La contraseña No ha sido actualizada');
				    redirect(base_url().'crearUsuario/UpdatePass/');
			    }
			}
		}
		else{
			$this->UpdatePass();
		}
    }

    public function UpdatePass()
	{
		$data = array();
		$this->template->set('title', 'INFORMES');
		//$this->template->load('layout', 'contents' , 'login/changePass', $data);
		$this->load->view('login/changePass');
	}
}
/* Fin del archivo Login.php */