<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_m');
        $this->load->model('groups_m');
        $this->load->library('form_validation');
    }

    public function index() {

        $this->form_validation->set_rules('login', 'login', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run()) {
            $password = $this->input->post('password');
            $login = $this->input->post('login');
            $user = $this->users_m->login($login, $password);
            
            if (is_object($user)) {
                
                if ($user->group_id == 1) {
                    $this->session->set_userdata('admin', $user);
                    redirect('admin/index');
                } else {
                    $this->session->set_userdata('user', $user);
                    //$_SESSION['user'];
                    redirect('user');
                }
            }
        }
        $view_data['groups'] = $this->groups_m->get_all();
        $this->load->view('welcome_message', $view_data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */