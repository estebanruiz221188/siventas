<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function index() {return 0;}

	function login_admin()
	{
		$this->load->library('session');
		$data["login"]=false;
		if(strlen($_POST["usuario"])>4 && strlen($_POST["password"])>4)
		{
			$this->load->database();
			$consulta="SELECT * FROM `sv_login_administrador` WHERE `login_adm_usuario` = '".$_POST["usuario"]."' COLLATE utf8_bin AND `login_adm_password` = '".sha1($_POST["password"])."'";
			$data["q"]=$consulta;
			$query=$this->db->query($consulta);
			if ($query->num_rows > 0)
			{
				foreach ($query->result() as $row)
				{
					if($row->estatus==1)
					{
						$this->session->set_userdata(array("ses_admin_activa"=>true,"ses_admin_id"=>$row->id_usuario,"ses_admin_nombre"=>$row->nombre_real_usuario));
						$data["login"]=true;
					}
				}

			}
		}
		echo json_encode($data);
	}

	function unlog()
	{
		$this->load->library('session');
		$this->session->destroy();
		$data["unlog"]=true;
		echo json_encode($data);
	}

}