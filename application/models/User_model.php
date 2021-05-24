<?php 
class User_Model extends CI_Model
{
    public function register_user(){
        $encrypted_pass = sha1($this->input->post('password'));
        $data = array(
            'lastname' => trim($this->input->post('prenom')),
            'firstname' => trim($this->input->post('nom')),
            'email' => trim($this->input->post('email')),
            'password' => $encrypted_pass,
            'city' => trim($this->input->post('city')),
            'Tel' => trim($this->input->post('tel')),
        );
        $this->db->insert('users',$data);
        return true;
    }
    public function register_admin(){
        $encrypted_pass = sha1($this->input->post('password'));
        $data = array(
            'lastname' => trim($this->input->post('prenom')),
            'firstname' => trim($this->input->post('nom')),
            'email' => trim($this->input->post('email')),
            'password' => $encrypted_pass,
            'city' => trim($this->input->post('city')),
            'Tel' => trim($this->input->post('tel')),
            'is_Admin' =>  1
        );
        $this->db->insert('users',$data);
        return true;
    }
    public function login_user($email,$password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(['email'=>$email,'password'=>sha1($password)]);
        $results = $this->db->get();
        if($results->num_rows() == 1){
            $user = $results->row();
            return $user->id;
        }else{
            return 'info incorrect';
        }
    }
    public function get_users(){
        $users = $this->db->get('users');
        return  $users->result();
    }
    public function get_users_info($id){
        $this->db->where(array('id'=>$id));
        $results = $this->db->get('users');
        return $results->row();
    }
    public function get_admins(){
        $this->db->where(array('is_Admin'=>1));
        $users = $this->db->get('users');
        return  $users->result();
    }
    public function get_users_info_by_id($id){
        $this->db->where(array('id'=>$id));
        $results = $this->db->get('users');
        return $results->row();
    }
    public function get_users_info_by_email($email){
        $this->db->where(array('email'=>$email));
        $result = $this->db->get('users');
        return $result;
    }
    public function delete_user($id){
        $this->db->where(array('id'=>$id));
        if($this->db->delete('users')){
            $this->Ads_model->user_annonces($id);
		}
        return true;
    }
}
?>