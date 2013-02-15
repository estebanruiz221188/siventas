<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	
	function index()
	{
		$url["url"]=base_url();
		$data["url"]=base_url();
		$data["menu"]=$this->load->view("menu_basico",$url,true);
		$data["footer"]=$this->load->view("footer",null,true);
		$data["contenido"]=$this->load->view("inicio",$url,true);
		$this->load->view("html_base",$data);
	}
}