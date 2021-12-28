<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class PrintPersona extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->helper('url');

		$this->load->library('ion_auth');


	}


	function index($id = 1)

	{

		$cond = "";


		// PAGINATION

		$config = array();

		$config['suffix'] = '?' . $_SERVER['QUERY_STRING'];

		$config["base_url"] = base_url() . "admin/printpersona/index";


		$config["first_url"] = base_url() . "admin/printpersona/index" . '?' . $_SERVER['QUERY_STRING'];

		include ('application/views/admin/printpdf/hogar/list_persona.php');
	}

}


