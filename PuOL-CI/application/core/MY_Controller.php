<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$useTheme[] = 't1';
		$this->load->library('template', $useTheme);
        $this->load->library(array('upload'));
		$this->load->helper(array('download'));
        $this->load->model(array('crud'));
	}
	
	public function index()
	{
		
	}

}

/* End of file Controller.php */
/* Location: ./application/core/Controller.php */