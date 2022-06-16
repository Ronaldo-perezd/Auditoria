<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login_model extends CI_Model
{

    public function LoginEmpresa($username, $password) //en uso
    { 
        $this->db->where("documento_IT", $username);
        $this->db->where("contrasena", md5($password));
        //MD5(), sha1(), PARA ENCRIPTAR CONTRASEÑA
        
        $resultado = $this->db->get("usuarios");

        if($resultado->num_rows() > 0)
        {
            return $resultado->row();
        }
        else
        {
            return false;
        }
    }


    public function CambiarClave($data2)
    {
        $id = $this->session->userdata('id');

            $this->db->where('ID', $id);
     return $this->db->update('usuarios', $data2);
    }
/*
    public function CambiarClaveRestablecida($id, $tipo, $data)
    {
        if($tipo == "EMPRESA")
        {
            $this->db->where('empCodigo', $id);
            return $this->db->update('empresa', $data);
        }
        else if($tipo == "ENTIDAD")
        {
            $this->db->where('usuCodigo', $id);
            return $this->db->update('usuario', $data);
        }
        else
        {
            return false;
        }
    }*/

    public function ObtenerUsuarioPorEmail($email)
    {
        $this->db->where('usuCorreo', $email);
        $resp = $this->db->get('usuario');
        if(count($resp->row()) == 0)
        {
            $this->db->where('empCorreo', $email);
            $respEnt = $this->db->get('empresa');

            if(count($respEnt->row()) == 0)
            {
                return false;
            }
            else
            {
                $data = array(
                    'codigo'=> $respEnt->row()->empCodigo,
                    'tipo'=> 'EMPRESA'
                );
                return $data;
            }
        }
        else
        {
            $data = array(
                'codigo'=> $resp->row()->usuCodigo,
                'tipo'=> 'ENTIDAD'
            );
            return $data;
        }
    }

    public function GetPerfImpo($id)
    {
        $this->db->select('*'); 
        $this->db->from('empresa_tipos'); 
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('temCodigo', 1);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function GetPerfComer($id)
    {
        $this->db->select('*'); 
        $this->db->from('empresa_tipos'); 
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('temCodigo', 2);

        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function GetPerfFabri($id)
    {
        $this->db->select('*'); 
        $this->db->from('empresa_tipos'); 
        $this->db->where('empCodigo', $id);
        $this->db->where('estCodigo', 1);
        $this->db->where('temCodigo', 3);

        $resultado = $this->db->get();
        return $resultado->row();
    }

}

/* Fin del archivo Usuario_model.php */