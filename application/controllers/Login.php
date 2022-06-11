<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->model('Vacuna_model');
	}

	public function Index() //en uso
	{
		if($this->session->userdata('login'))
		{
			redirect(base_url().'home');
		}
		else
		{
			$this->session->sess_destroy();	
			$data = array();
			$this->template->set('title', 'Login');
			$this->template->load('login_layout', 'contents' , 'login/index', $data);
		}
	}

	public function Auth() //en uso
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");

			$resEmpresa = $this->Login_model->LoginEmpresa($username, $password);
			if(!$resEmpresa)
			{
				$this->session->set_flashdata('error', 'El usuario y/o contraseña son incorrectos.');
				redirect(base_url());
			}
			else 
			{	
				$data = array(
					'id' => $resEmpresa->id,
					'documento_IT' => $resEmpresa->documento_IT,
					'login' => TRUE
				);
				$this->session->set_userdata($data);
				redirect(base_url().'home');
			}			
	}

	
	public function Register() //en uso
	{
		$data = array();
		$this->template->load('login_layout', 'contents' , 'login/registrar', $data);
	}

	public function Registrar()
	{
		$usuario = $this->input->post('user');
		$this->form_validation->set_rules('user', 'usuario', 'required|is_unique[usuarios.documento_IT]',array('is_unique' => 'Este correo electrónico ya se encuentra registrado')); 
		$clave = $this->input->post('pass');
		$this->form_validation->set_rules('pass', 'contraseña', 'required');
		
		if ($this->form_validation->run())
		{
				$data = array(
					'documento_IT' => $usuario,
					'contrasena' => $clave
				);
	
				if($this->Vacuna_model->guardar($data))
				{
					redirect(base_url());
				}
				else
				{
					$this->session->set_flashdata('error', 'No se pudo registrar la empresa');
					redirect(base_url().'Login/register');
				}
		}
		else 
		{
		$this->Register();
		}
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());	
	}
}
/* Fin del archivo Login.php */