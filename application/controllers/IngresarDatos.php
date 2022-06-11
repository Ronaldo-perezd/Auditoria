<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IngresarDatos extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Carnet_model');
		$this->load->model('Vacuna_model');		
	}

	public function RegistrarUser()
	{
	    $this->db = $this->load->database('conexion_dividida', TRUE);
        $this->db = $this->load->database('conexion_2', TRUE);

		$username = $this->input->post('username');
		$this->form_validation->set_rules('username', 'nombre de usuario', 'required');
		$cedula = $this->input->post('cedula');
		//$this->form_validation->set_rules('cedula', 'Cedula', 'required'); //SIN VALIDAR
		$this->form_validation->set_rules('cedula', 'Cedula', 'required|is_unique[registro_persona.CEDULA]',array('is_unique' => 'Este usuario ya se encuentra registrado'));
		$fecha_Nac = $this->input->post('fecha_Nac');
		$this->form_validation->set_rules('fecha_Nac', 'Fecha De Nacimiento', 'required');
		$ciudad_vacunado = $this->input->post('ciudad_vacu');
		$this->form_validation->set_rules('ciudad_vacu', 'Ciudad De Vacunacion', 'required');
		$cargo = $this->input->post('cargo');
		$this->form_validation->set_rules('cargo', 'Cargo', 'required');
		$ips_Usu = $this->input->post('ips_Usu');
		$this->form_validation->set_rules('ips_Usu', 'IPS Del Usuario', 'required');
		$nombre_Vacu = $this->input->post('nombre_Vacu');
		$this->form_validation->set_rules('nombre_Vacu', 'Nombre Del Vacunador', 'required');
		$ciud_residencia = $this->input->post('ciudad_Usu');
		$this->form_validation->set_rules('ciudad_Usu', 'Sede Del usuario', 'required');
		$fabricante_Vacu = $this->input->post('fabricante_Vacu');
		$this->form_validation->set_rules('fabricante_Vacu', 'Nombre Fabricante De La Vacuna', 'required');

		//$contraseña = $this->input->post('pass');
		//$this->form_validation->set_rules('pass', 'contraseña', 'required');
	
		if ($this->form_validation->run()){
				$data2 = array(
					'CEDULA' => $cedula,
					'FECHA_NAC' => $fecha_Nac,
					'CIUDAD_VACU' => $ciudad_vacunado,
					'TIPO_USU' => $cargo,
					'IPS_USUARIO'=> $ips_Usu,
					'NOMBRE_VACU' => $nombre_Vacu,
					'CIUDAD_USUARIO' => $ciud_residencia,
					'FABRICANTE_VACU' => $fabricante_Vacu
				);

				$data1 = array(
					'NOMBRE_USU' => $username,
					'CEDULA' => $cedula
				);

					$this->load->model('Vacuna_model', 'vc');
					//$this->vc->guardar2($data2);
					//$this->vc->guardarNube($data2);
					$this->vc->guardarRemoto($data2);
					//$this->vc->guardar3($data1);
					//$this->vc->guardarNube2($data1);
					$this->vc->guardarRemoto2($data1);

					//$id = $this->Vacuna_model->guardar2($data2);
					//$this->load->"mostrar.php"('RegistrarUser', $id);
				//$this->Vacuna_model->guardar2($data2);
	
				if($this->Vacuna_model->guardar2($data2))
				{
					$this->vc->guardarNube($data2);
					$this->vc->guardarRemoto($data2);
					redirect(base_url().'home/index');
				}
				else
				{
					$this->session->set_flashdata('error', 'No Se Pudo Registrar El Usuario');
					redirect(base_url().'IngresarDatos/Register');
				}
		}
			else 
			{
			$this->Register();
			}
	}

	public function Register() //en uso
	{
		$this->load->view('vacuna/encuesta');
		//$data2 = array();
		//$this->template->load('login_layout', 'contents' , 'vacuna/vistaprincipal', $data2);
	}
	
	public function GetInformation() //en uso
	{
		$this->db = $this->load->database('conexion_2', TRUE);

		$data = array(

			'fabricante' => $this->Carnet_model->GetFabricante(),
			'persona' => $this->Carnet_model->GetPersona(),
					
		);

		$this->template->set('title', 'INFORMES');

		$this->template->load('layout', 'contents' , 'vacuna/datos', $data);
		//$this->load->view('vacuna/datos', $data);
	}
}
/* Fin del archivo Login.php */