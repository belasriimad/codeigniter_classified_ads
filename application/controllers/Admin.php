<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		$data['annonces'] =  $this->Ads_model->get_all_annonces();
		$data['users'] =  $this->User_model->get_users();
		$data['admins'] =  $this->User_model->get_admins();
		$this->load->view('admins/admin',$data);
	}
	public function add(){
		$this->load->view('admins/add-admin');
	}
	public function store(){
		if(!$this->session->userdata("admin")){
			redirect(base_url());
		} 
		$this->form_validation->set_rules('nom','Nom','required|trim|min_length[3]');
		$this->form_validation->set_rules('prenom','Prénom','required|trim|min_length[3]');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Mot de passe','required|trim|min_length[3]');
		if($this->form_validation->run() == FALSE){
			$data = array(
				'requires' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$this->load->view('admins/add-admin',$data);
		}else{
			if($this->User_model->register_admin()){
				$this->session->set_flashdata('registred','Account created');
				redirect(base_url().'admin');
			}
		}
	}
}
