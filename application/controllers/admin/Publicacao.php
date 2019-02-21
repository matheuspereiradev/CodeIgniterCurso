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

    public function criarPost() {
        $dados['titulo'] = 'Painel administrativo';
        $dados['subtitulo'] = "postagem";
        $this->load->model('Categorias_model', 'categorias');
        $dados['categorias'] = $this->categorias->listarcategorias();
        $this->load->view('backend/template/htmlheader', $dados);
        $this->load->view('backend/template/templatemenu');
        $this->load->view('backend/adicionarPost');
        $this->load->view('backend/template/htmlfooter');
    }

    public function salvarPost() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('titulo', 'Titulo do post', 'required|min_length[5]|max_length[150]|is_unique[postagens.titulo]');
        $this->form_validation->set_rules('subtitulo', 'Resumo do post', 'required|min_length[10]|max_length[150]');
        $this->form_validation->set_rules('conteudo', 'Conteudo do post', 'required|min_length[10]|max_length[4500]');
        $this->form_validation->set_rules('cat', 'categoria', 'required|differs[n]', array('differs' => 'Selecione a categoria'));

        if ($this->form_validation->run() == false) {
            $this->criarPost();
        } else {
            $categoria = $this->input->post('cat');
            $titulo = $this->input->post('titulo');
            $subtitulo = $this->input->post('subtitulo');
            $conteudo = $this->input->post('conteudo');
            $data = pegardata(); //pega data do meu helper funcoes
            //$img = $this->input->post('img');
            $user = $this->session->userdata('dados')->id;


            if ($this->publicacao->inserir($categoria, $titulo, $subtitulo, $conteudo, $data, $user)) {
                redirect(base_url('admin/Publicacao'));
            } else {
                echo "Erro adiconar a publicação";
            }
        }
    }

}