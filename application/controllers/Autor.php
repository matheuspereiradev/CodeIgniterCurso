<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autor extends CI_Controller {

    public function __construct() {
        parent::__contruct();
    }

    public function index() {
        $this->load->view('template/htmlheader');
        $this->load->view('template/header');
        $this->load->view('template/aside');
        $this->load->view('template/footer');
        $this->load->view('template/htmlfooter');
    }

}
