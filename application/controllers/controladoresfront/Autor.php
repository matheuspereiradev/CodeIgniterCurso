<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Categorias_model', 'categorias');
        $this->categorias = $this->categorias->listarcategorias();
        $this->load->model('Autor_model', 'autor');
    }

    public function index($id, $slug = null) {
        $dados['categoria'] = $this->categorias;
        $dados['autor'] = $this->autor->exibirautor($id);
        $dados['titulo'] = 'Usuários';
        $dados['subtitulo'] = '';
        $dados['subtitulodb'] = $this->autor->nomeautor($id);



        $this->load->view('frontend/template/htmlheader', $dados);
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/autor');
        $this->load->view('frontend/template/aside');
        $this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/htmlfooter');
    }
    public function sobre() {
        $dados['categoria'] = $this->categorias;
        $dados['autores']= $this->autor->listarautores();
        $dados['titulo']='Sobre nós';
        $dados['subtitulo']='Conheça nossa equipe';
        $this->load->view('frontend/template/htmlheader',$dados);
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/sobrenos');
        $this->load->view('frontend/template/aside');
        $this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/htmlfooter');
    }

}
