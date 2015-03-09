<?php


class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_m');
          $this->load->model('groups_m');
          $this->load->library('form_validation');
    }
    
   public function index()
   {
       if($this->session->userdata('user'))
       {
           echo "jesteś zalogowany";
       }
       else
       {
           echo "spadaj";
       }
       
   }
   
   public function logout() {
       $this->session->sess_destroy();
       redirect('');
       
       
   }
}

