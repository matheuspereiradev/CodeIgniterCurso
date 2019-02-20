<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Publicacoes_model', 'publicacao');
        if (!$this->session->userdata('status')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index() {
        $this->load->library('table');
        $dados['titulo'] = 'Painel administrativo';
        $dados['subtitulo'] = "postagens";
        $dados['publicacoes'] = $this->publicacao->suas_publicacoes($this->session->userdata('dados')->id);
        $this->load->view('backend/template/htmlheader', $dados);
        $this->load->view('backend/template/templatemenu');
        $this->load->view('backend/listarpostagens');
        $this->load->view('backend/template/htmlfooter');
    }

}
