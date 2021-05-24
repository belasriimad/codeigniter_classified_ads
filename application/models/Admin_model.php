<?php
 
/**
 *
 */
class Admin_model extends CI_Model
{
  public function store_user(){
    $encrypted_pass = sha1($this->input->post('password'));
    $data = array(
        'lastname' => trim($this->input->post('prenom')),
        'firstname' => trim($this->input->post('nom')),
        'email' => trim($this->input->post('email')),
        'password' => $encrypted_pass,
        'city' => trim($this->input->post('city')),
        'Tel' => trim($this->input->post('tel')),
        'is_Admin' => 1
    );
    $this->db->insert('users',$data);
    return true;
  }
}
?>