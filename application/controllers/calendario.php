<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	
	function index()
	{
		echo '<iframe src="https://www.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=r93ib37llulifijivv6nq428pg%40group.calendar.google.com&amp;color=%232952A3&amp;ctz=America%2FMexico_City" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe>';
	}
}