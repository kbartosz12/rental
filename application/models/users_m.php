<?php


class Users_m extends CI_Model{
    
private $table = 'users';
private  $key = 'users_id';

public function __construct() 
{
    parent::__construct();
    $this->load->database();
       
}

public function insert($data) 
{
    
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
    
 }
 
 
 public function login($login, $password) {
     $this->db->where('login', $login);
     $this->db->where('password', $password);
     return  $this->db->get($this->table)->row();
     
          
     
 }
 
 public function get_all() {
     
     return $this->db->get($this->table)->result();
     
 }
 
 public function delete($user_id) {
     
     $this->db->where('user_id', $user_id);
     return $this->db->delete($this->table);
     
 }
 public function get($user_id) {
     
     $this->db->where('user_id', $user_id);
     return $this->db->get($this->table)->row();
     
 }
 
 public function update($user_id, $data)
 {
     $this->db->where('user_id', $user_id);
     return $this->db->update($this->table, $data);
 }
 
}
