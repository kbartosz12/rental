<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of index
 *
 * @author Krzysztof
 */
class Index extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $admin = $this->session->userdata('admin');
        echo 'cześć ' . $admin->name;
    }

}
