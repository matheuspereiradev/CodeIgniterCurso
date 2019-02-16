<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Autor_model', 'modelusr');
    }

    public function index() {
        if (!$this->session->userdata('status')) {
            redirect(base_url('admin/login'));
        }
        $this->load->library('table');
        $dados['titulo'] = 'Painel administartivo';
        $dados['subtitulo'] = 'usuários';
        $dados['usuarios'] = $this->modelusr->listarautores();
        $this->load->view('backend/template/htmlheader', $dados);
        $this->load->view('backend/template/templatemenu');
        $this->load->view('backend/usuario');
        $this->load->view('backend/template/htmlfooter');
    }

    public function alterar($id) {
        if (!$this->session->userdata('status')) {
            redirect(base_url('admin/login'));
        }
        $dados['titulo'] = 'Painel administartivo';
        $dados['subtitulo'] = 'usuário';
        $dados['usuario'] = $this->modelusr->buscar($id);
        $this->load->view('backend/template/htmlheader', $dados);
        $this->load->view('backend/template/templatemenu');
        $this->load->view('backend/editarUsuario');
        $this->load->view('backend/template/htmlfooter');
    }

    public function salvar_usr_editado() {
        if (!$this->session->userdata('status')) {
            redirect(base_url('admin/login'));
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nomeusr', 'Nome do usuário', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('emailusr', 'Email do usuário', 'required|min_length[3]|max_length[100]|valid_email|is_unique[usuario.email]');
        $this->form_validation->set_rules('historicousr', 'Histórico de usuário', 'required|min_length[20]');
        $this->form_validation->set_rules('loginusr', 'Login', 'required|min_length[3]|max_length[50]|is_unique[usuario.user]');
        $this->form_validation->set_rules('senhausr', 'Senha', 'required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('senhausr2', 'Senha de confirmação', 'required|min_length[4]|max_length[50]|matches[senhausr]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $id = $this->input->post('id');
            $nome = $this->input->post('nomeusr');
            $email = $this->input->post('emailusr');
            $historico = $this->input->post('historicousr');
            $user = $this->input->post('loginusr');
            $senha = $this->input->post('senhausr');

            if ($this->modelusr->editar($id, $nome, $email, $historico, $user, $senha)) {
                redirect(base_url('admin/Usuarios'));
            } else {
                echo "Erro ao editar usuário";
            }
        }
        
    }

    public function inserirusr() {
        if (!$this->session->userdata('status')) {
            redirect(base_url('admin/login'));
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nomeusr', 'Nome do usuário', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('emailusr', 'Email do usuário', 'required|min_length[3]|max_length[100]|valid_email|is_unique[usuario.email]');
        $this->form_validation->set_rules('historicousr', 'Histórico de usuário', 'required|min_length[20]');
        $this->form_validation->set_rules('loginusr', 'Login', 'required|min_length[3]|max_length[50]|is_unique[usuario.user]');
        $this->form_validation->set_rules('senhausr', 'Senha', 'required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('senhausr2', 'Senha de confirmação', 'required|min_length[4]|max_length[50]|matches[senhausr]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $nome = $this->input->post('nomeusr');
            $email = $this->input->post('emailusr');
            $historico = $this->input->post('historicousr');
            $user = $this->input->post('loginusr');
            $senha = $this->input->post('senhausr');

            if ($this->modelusr->inserir($nome, $email, $historico, $user, $senha)) {
                redirect(base_url('admin/Usuarios'));
            } else {
                echo "Erro ao cadastrar usuário";
            }
        }
    }

    public function excluir($id) {
        if (!$this->session->userdata('status')) {
            redirect(base_url('admin/login'));
        }
        if ($this->modelusr->excluir($id)) {
            redirect(base_url('admin/Usuarios'));
        } else {
            echo "Erro ao excluir dados";
        }
    }

    public function pag_login() {
        $dados['titulo'] = 'Painel administartivo';
        $dados['subtitulo'] = 'Entrar';

        $this->load->view('backend/template/htmlheader', $dados);
        $this->load->view('backend/login');
        $this->load->view('backend/template/htmlfooter');
    }

    public function fazerlogin() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('usuariologin', 'Login', 'required|min_length[3]'); //nome do input. apelido que vai exibir prousuario
        $this->form_validation->set_rules('usuariosenha', 'Senha', 'required|min_length[3]'); //nome do input. apelido que vai exibir prousuario
        if ($this->form_validation->run() == false) {//SE DER ERRADO
            $this->pag_login(); //chama o metodo index daqui
        } else {
            $usuario = $this->input->post('usuariologin');
            $senha = $this->input->post('usuariosenha');
            $dadosusr = $this->modelusr->buscarUsrLogin($usuario, $senha);
            if (count($dadosusr) == 1) {//se encontar no banco
                $dadosUsuario['dados'] = $dadosusr[0];
                $dadosUsuario['status'] = true;
                $this->session->set_userdata($dadosUsuario);
                redirect(base_url('admin'));
            } else {
                $dadosUsuario['dados'] = null;
                $dadosUsuario['status'] = false;
                $this->session->set_userdata($dadosUsuario);
                redirect(base_url('admin/login'));
            }
        }
    }

    public function logout() {
        $dadosUsuario['dados'] = null;
        $dadosUsuario['status'] = false;
        $this->session->set_userdata($dadosUsuario);
        redirect(base_url('admin/login'));
    }

}
