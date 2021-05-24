<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {
	public function index()
	{	
		$data['annonces'] = $this->Ads_model->get_all_annonces();
		$this->load->view('ads/index',$data);
	}
	public function category()
	{	
		$data['annonces'] = $this->Ads_model->get_annonce_by_category($this->uri->segment(3));
		$this->load->view('ads/by-category',$data);
	}
	public function city()
	{	
		$data['annonces'] = $this->Ads_model->get_annonce_by_city($this->uri->segment(3));
		$this->load->view('ads/by-city',$data);
    }
	public function add(){
		$this->form_validation->set_rules('cat','Category','required|trim');
		$this->form_validation->set_rules('city','City','required|trim');
		$this->form_validation->set_rules('title','Title','required|trim');
		$this->form_validation->set_rules('body','Body','required|trim');
		if($this->form_validation->run() == FALSE){
			$data = array(
				'requires' => validation_errors()
			);
			$this->session->set_flashdata($data);
			$this->load->view('ads/add',$data);
		}else{
			$this->Ads_model->register_annonce();
			$this->session->set_flashdata('annonce_added','Ad added');
			redirect('/');
		}
	}
	public function view(){
		$id = $this->uri->segment(3);
		$data['annonce'] = $this->Ads_model->get_annonce_info($id);
		if(empty($data['annonce'])){
			redirect('/');
		}
		$data['next'] = $this->Ads_model->get_next_annonce(1,$id);
		$data['last'] = $this->Ads_model->get_last_annonce(1,$id);
		$this->load->view('ads/view',$data);
	}
	public function find(){
		$city = $this->input->post('city');
		$category = $this->input->post('cat');
		$title = $this->input->post('search');
		$data['annonces']= $this->Ads_model->get_annonces_with_annonce_by_categorie_and_ville_and_title($title,$city,$category);
		$this->load->view('ads/search-ad',$data);
	}
	public function delete($id){
		$this->Ads_model->delete_annonce($id);
		$this->session->set_flashdata('deleted','Ad deleted');
		redirect(base_url().'admin');
	}
}
