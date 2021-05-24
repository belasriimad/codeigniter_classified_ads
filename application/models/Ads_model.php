<?php
 
/**
 *
 */
class Ads_model extends CI_Model
{
    function register_annonce(){
        $file = $this->upload_image();
        $files = $this->security->sanitize_filename($file);
        if($files == "image_not_supporetd"){
            $this->session->set_flashdata('type_not_supported','Le type d\'image que vous tentez de télécharger n\'est pas autorisé');
            redirect('ads/add');
        }elseif($files == "size_excced"){
            $this->session->set_flashdata('size_excced','Le fichier téléchargé dépasse la taille maximale autorisée');
            redirect('ads/add');
        }else{
            $data = array(
                    'user_id' =>  $this->session->userdata('user_id'),
                    'categorY' => $this->input->post('cat'),
                    'city' => $this->input->post('city'),
                    'title' => $this->input->post('title'),
                    'body' => $this->input->post('body'),
                    'image' =>$files,
                    'created' => date("Y-m-d H:s:m"),
                );
            $insert = $this->db->insert('ads',$data);
            return $insert;
        }
    }
    public function upload_image(){
        $target_dir = "./assets/uploads/";
        $target_file = $target_dir.basename($_FILES["photo"]["name"]);
        $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $allowed = array('png','jpg','jpeg');
        if(empty($_FILES["photo"]["size"])){
            return "camera.png";
        }elseif(!in_array($FileType,$allowed)){
            return "image_not_supporetd";
        }elseif($_FILES["photo"]["size"] > 2000000){
            return "size_excced";
        }else{
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            return $_FILES["photo"]["name"];
        }
    }
    public function get_annonce_by_category($category){
        $this->db->select('*');
        $this->db->from('ads');
        $this->db->where(array('category'=>$category));
        $annonces = $this->db->get();
        return $annonces->result();
    }
    public function get_annonce_by_city($city){
        $this->db->select('*');
        $this->db->from('ads');
        $this->db->where(array('city'=>$city));
        $annonces = $this->db->get();
        return $annonces->result();
    }
    public function delete_annonce($id){
        $this->db->where(array('id'=>$id));
        $this->db->delete('ads');
        return true;
    }
    public function user_annonces($id){
        $this->db->where(array('user_id'=>$id));
        $this->db->delete('ads');
        return true;
    }
    public function get_annonces_with_annonce_by_categorie_and_ville_and_title($title,$city,$category){
        $this->db->select('*');
        $this->db->from('ads');
        if($title != null){
            $this->db->like('title',$title);
        }
        if($category != null){
            $this->db->where(array('category'=>$category));
        }
        if($city != null){
            $this->db->where(array('city'=>$city));
        }
        $annonces = $this->db->get();
        return $annonces->result();
    }
    public function get_annonce_info($id){
        $this->db->select('a.*,u.*');
        $this->db->from('ads as a');
        $this->db->join('users as u','u.id = a.user_id');
        $this->db->where(array('a.id'=>$id));
        $query = $this->db->get();
        return $query->row();
    }
    public function get_next_annonce($limit,$start)
    {
        $this->db->where('id >',$start);
        $this->db->limit($limit);
        $this->db->order_by('id');
        $query = $this->db->get('ads');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row;
        }else{
            return false;
        }
    }
    public function get_last_annonce($limit,$start)
    {
        $this->db->where('id',$start-=1);
        $this->db->limit($limit);
        $this->db->order_by('id');
        $query = $this->db->get('ads');
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row;
        }else{
            return false;
        }
    }
    function get_annonces($limit,$start){
        $this->db->select('*');
        $this->db->from('ads');
        $this->db->order_by('created','desc');
        $this->db->limit($limit,$start);
        $annonces = $this->db->get();
        return $annonces->result();
    }
    function get_all_annonces(){
        $this->db->select('*');
        $this->db->from('ads');
        $this->db->order_by('created','desc');
        $annonces = $this->db->get();
        return $annonces->result();
    }
}
?>