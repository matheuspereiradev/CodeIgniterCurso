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
        $this->load->helper('funcoes');
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
        $this->load->helper('funcoes');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('titulo', 'Titulo do post', 'required|min_length[5]|max_length[150]|is_unique[postagens.titulo]');
        $this->form_validation->set_rules('subtitulo', 'Resumo do post', 'required|min_length[10]|max_length[150]');
        $this->form_validation->set_rules('conteudo', 'Conteudo do post', 'required|min_length[10]|max_length[4500]');
        $this->form_validation->set_rules('cat', 'categoria', 'required', array('differs' => 'Selecione a categoria'));

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

    public function excluir($id) {
        if ($this->publicacao->excluir($id)) {
            redirect(base_url('admin/publicacao'));
        } else {
            echo "Erro ao excluir post";
        }
    }

    public function alterar($id) {
        $dados['titulo'] = 'Painel administrativo';
        $dados['subtitulo'] = "postagem";
        $dados['noticia'] = $this->publicacao->pesquisar_post($id);
        $this->load->model('Categorias_model', 'categorias');
        $dados['categorias'] = $this->categorias->listarcategorias();
        $this->load->view('backend/template/htmlheader', $dados);
        $this->load->view('backend/template/templatemenu');
        $this->load->view('backend/editarPost');
        $this->load->view('backend/template/htmlfooter');
    }

    public function salvarPostEditado($idcrip) {
        $this->load->helper('funcoes');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('titulo', 'Titulo do post', 'required|min_length[5]|max_length[150]|is_unique[postagens.titulo]');
        $this->form_validation->set_rules('subtitulo', 'Resumo do post', 'required|min_length[10]|max_length[150]');
        $this->form_validation->set_rules('conteudo', 'Conteudo do post', 'required|min_length[10]|max_length[4500]');
        $this->form_validation->set_rules('cat', 'categoria', 'required');

        if ($this->form_validation->run() == false) {
            $this->alterar($idcrip);
        } else {
            $id = $this->input->post('id');
            $categoria = $this->input->post('cat');
            $titulo = $this->input->post('titulo');
            $subtitulo = $this->input->post('subtitulo');
            $conteudo = $this->input->post('conteudo');
            $data = pegardata(); //pega data do meu helper funcoes
            $user = $this->session->userdata('dados')->id;


            if ($this->publicacao->editar($id, $categoria, $titulo, $subtitulo, $conteudo, $data, $user)) {
                redirect(base_url('admin/Publicacao'));
            } else {
                echo "Erro adiconar a publicação";
            }
        }
    }

    public function novafoto() {
        $id = $this->input->post('id');
        $config['image_library'] = 'gd2';
        $config['upload_path'] = './assets/frontend/img/bannerpost';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $id . ".jpg";
        $config['overwrite'] = TRUE; //permanecer com mesmo id
        $this->load->library('upload');
        //fazendo o upload
        $this->upload->initialize($config);
        if (!$this->upload->do_upload()) {
            echo $this->upload->display_errors() . 'erro no upload';
        } else {
            $config2['source_image'] = './assets/frontend/img/bannerpost/' . $id . '.jpg';
            $config2['create_thumb'] = FALSE;
            $config2['width'] = 900;
            $config2['height'] = 300;
            $this->load->library('image_lib');
            $this->image_lib->initialize($config2);
            if ($this->image_lib->resize()) {
                if ($this->publicacao->inserir_imagem($id)) {//se conseguir fazer a alteração no banco
                    redirect(base_url('admin/Publicacao/alterar/' . $id));
                } else {
                    echo "Erro ao alterar imagem no banco";
                }
            } else {
                echo $this->image_lib->display_errors() . 'erro na imagem';
            }
        }
    }

}
