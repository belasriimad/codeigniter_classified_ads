<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function index()
	{
		
    }
    public function register()
	{
		if($this->session->userdata("logged")){
			redirect(base_url());
		} 
		$this->form_validation->set_rules('nom','First Name','required|trim|min_length[3]');
		$this->form_validation->set_rules('prenom','Last Name','required|trim|min_length[3]');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]');
		if($this->form_validation->run() == FALSE){
			$data = array(
				'requires' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$this->load->view('users/register',$data);
		}else{
			if($this->User_model->register_user()){
				$this->session->set_flashdata('registred','Account created');
				redirect(base_url());
			}
		}
	}
	public function login(){
		if($this->session->userdata("logged")){
			redirect(base_url());
		} 
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]');
		if($this->form_validation->run() == FALSE){
			$data = array(
				'errors' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$this->load->view('users/login',$data);
		}else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->User_model->login_user($email,$password);
			if($user == 'info incorrect'){
				$this->session->set_flashdata('login_failed','Invalid credentials');
				redirect(base_url()."user/login");
			}else{
				$user = $this->User_model->get_users_info_by_id($user);
				$user_data = array(
					'user_id' => $user->id,
					'email'=> $user->email,
					'nom'=> $user->firstname,
					'prenom'=> $user->lastname,
					'photo'=>$user->photo,
					'logged' => true,
					'admin' => $user->is_Admin
				);
				$this->session->set_userdata($user_data);
				redirect(base_url());
			}
		}	
	}
	public function logout(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nom');
		$this->session->unset_userdata('prenom');
		$this->session->unset_userdata('logged');
		$this->session->unset_userdata('admin');
		redirect(base_url());
	}
	public function delete($id){
		$deleted = $this->User_model->delete_user($id);
		if($this->session->userdata('user_id') == $id){
			$this->logout();
		}
		$this->session->set_flashdata('deleted','Account deleted');
		redirect(base_url().'admin');
	}
}
