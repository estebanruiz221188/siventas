<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	function index() {return 0;}

	function login_admin()
	{
		$this->load->model('login_model');
		$this->login_model->login_adm($_POST["usuario"],$_POST["password"]);
	}

	function unlog()
	{
		$this->load->library('session');
		$this->session->destroy();
		$data["unlog"]=true;
		echo json_encode($data);
	}

}