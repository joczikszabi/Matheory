<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Polynomials extends CI_Controller {

	public function index()
	{
		$data['section'] = $this->load->view('polynomials/basic_operations.php', '', True);
		$this->load->view('content', $data);
	}

	
}?>