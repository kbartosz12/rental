<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_m');
          $this->load->model('groups_m');
          $this->load->library('form_validation');
    }

    public function index() {
        
        $this->form_validation->set_rules('name', 'Imię i nazwisko','required');
        $this->form_validation->set_rules('login', 'login','required|is_unique[users.login]');
        $this->form_validation->set_rules('password', 'password','required|matches[password2]');
        $this->form_validation->set_rules('password2', 'password2','required');
        $this->form_validation->set_rules('group_id', 'group_id','required|integer');
        $this->form_validation->set_rules('mail', 'email','required|valid_email');
        
        
        if ($this->form_validation->run()) {
            $data = array(
                'name' => $this->input->post('name'),
                'login' => $this->input->post('login'),
                'password' => $this->input->post('password'),
                'group_id' => $this->input->post('group_id'),
                'email' => $this->input->post('mail'),
            );
            
            $this->users_m->insert($data);
            
        }
        $view_data['groups'] = $this->groups_m->get_all();
        $this->load->view('register', $view_data);
         
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */