<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['annonces'] = $this->Ads_model->get_annonces(15,0);
		$this->load->view('home',$data);
	}
}
