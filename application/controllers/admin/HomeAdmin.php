<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAdmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('status')){//proteção
            redirect(base_url('admin/login'));
        }
    }

    public function index() {//metodo para carregar a pagina home

        $dados['titulo'] = 'Painel administartivo';
        $dados['subtitulo'] = 'home';

        $this->load->view('backend/template/htmlheader',$dados); //sempre é igual por isso ta no template
        $this->load->view('backend/template/templatemenu'); //sempre é igual
        $this->load->view('backend/home'); //sempre muda esta é a pagina home do site diferencial desse metodo
        $this->load->view('backend/template/htmlfooter'); //sempre igual
    }

}
