<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author Krzysztof
 */
class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('groups_m');
        $this->load->model('users_m');
    }

    public function index() {
        $this->lista();
    }

    public function create() {

        $this->user_validation();
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

    public function lista() {
        $lista = $this->users_m->get_all();
        $data['list'] = $lista;
        $this->load->view('admin/users/lista', $data);
    }

    public function delete($user_id) {
        if (ctype_digit($user_id)) {
            $delete = $this->users_m->delete($user_id);
        }
        redirect('admin/users/lista');
    }

    /*
     * Strona z formularzem edycji 
     */
    public function edit($user_id) {
        //$id = (int)$user_id;
        if (ctype_digit($user_id)) {
            $qweert = $this->users_m->get($user_id);
            if ($qweert) {
                $data['user'] = $qweert;
                $data['groups'] = $this->groups_m->get_all();
                $this->load->view('admin/users/edit', $data);
            } else {
                show_404();
            }
        } else {
            redirect('admin/users/lista');
        }
    }

    /**
     * Akcja po wysłaniu formularza edycji
     * @param strig $user_id ID użytkownika
     */
    public function edit_post($user_id) {
        $this->user_validation();
        if ($this->form_validation->run()) {
            $data = $this->readData();
            $this->users_m->update($user_id, $data);
            redirect('admin/users/lista');
        } else {
            $this->edit($user_id);
        }
    }

    public function add() {
        $this->user_validation();
        if ($this->form_validation->run()) {
            $data = $this->readData();
            $this->users_m->insert($data);
            redirect('admin/users/lista');
        }
        $view_data['groups'] = $this->groups_m->get_all();
        $this->load->view('admin/users/register', $view_data);
    }

    /**
     * Tworzenie tablicy z danymi użytkownika
     * @return type\
     */
    private function readData() {
        return $data = array(
            'name' => $this->input->post('name'),
            'login' => $this->input->post('login'),
            'password' => $this->input->post('password'),
            'group_id' => $this->input->post('group_id'),
            'email' => $this->input->post('mail'),
        );
    }

    private function user_validation() {
        $this->form_validation->set_rules('name', 'Imię i nazwisko', 'required');
        $this->form_validation->set_rules('login', 'login', 'required|is_unique[users.login]');
        $this->form_validation->set_rules('password', 'password', 'required|matches[password2]');
        $this->form_validation->set_rules('password2', 'password2', 'required');
        $this->form_validation->set_rules('group_id', 'group_id', 'required|integer');
        $this->form_validation->set_rules('mail', 'email', 'required|valid_email');
    }

}
