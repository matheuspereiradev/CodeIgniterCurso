<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        if(!$this->session->userdata('status')){
            redirect(base_url('admin/login'));
        }
        $dados['titulo'] = 'Painel administartivo';
        $dados['subtitulo'] = 'usuários';

        $this->load->view('backend/template/htmlheader', $dados);
        $this->load->view('backend/template/templatemenu');
        $this->load->view('backend/usuarios');
        $this->load->view('backend/template/htmlfooter');
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
            $this->load->model('Usuario_model', 'modelusr');
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
