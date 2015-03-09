<?php

class Groups_m extends CI_Model{
    
    private $table = 'groups';
private  $key = 'group_id';

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
 
 public function get_all() {
     
     return $this->db->get($this->table)->result();
     
 }
 
}
