<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

    public function __construct() {//idem home
        parent::__construct();
        $this->load->model('Categorias_model', 'modelcategorias'); //carrega esse model para tds as views pq tds vao usar
        $this->categoria = $this->modelcategorias->listarcategorias();
    }

    public function index($id, $slug = null) {//metodo para carregar a pagina por categorias
        $dados['categoria'] = $this->categoria; //idem home
        $this->load->model('publicacoes_model');
        $dados['postagem'] = $this->publicacoes_model->categoria_pub($id); //passar o id pro metodo categorias pub
        //dados para o cabeçalho
        $dados['titulo'] = 'Categorias';
        $dados['subtitulo'] = ''; //titulo e subtitulo do post
        $dados['subtitulodb'] = $this->modelcategorias->listartitulo($id); //quando o subtitulo estiver vazio prgs fo bsnco //nao precisa carregar usando o load pq ele ja ta carregado la no construtor

        $this->load->view('frontend/template/htmlheader', $dados); //sempre é igual por isso ta no template
        $this->load->view('frontend/template/header'); //sempre é igual
        $this->load->view('frontend/categoria');
        $this->load->view('frontend/template/aside'); //sempre é igual
        $this->load->view('frontend/template/footer'); //sempre é igual
        $this->load->view('frontend/template/htmlfooter'); //sempre igual
    }

}
