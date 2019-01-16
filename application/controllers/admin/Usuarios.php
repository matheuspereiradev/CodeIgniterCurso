<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {//metodo para carregar a pagina home
        $dados['titulo'] = 'Painel administartivo';
        $dados['subtitulo'] = 'home';

        $this->load->view('backend/template/htmlheader', $dados); //sempre é igual por isso ta no template
        $this->load->view('backend/template/templatemenu'); //sempre é igual
        $this->load->view('backend/home'); //sempre muda esta é a pagina home do site diferencial desse metodo
        $this->load->view('backend/template/htmlfooter'); //sempre igual
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
            $this->db->where('user', $usuario);
            $this->db->where('senha', $senha);
            $userLogado = $this->db->get('usuario')->result();
            if (count($userLogado) == 1) {//se encontarr no banco
                $dadosSessao['userLogado'] = $userLogado[0];
                $dadosSessao['userLogado'] = true;
                /* $newdata = array(
                    'nome' => 'matheus',
                    'email' => 'matheus@gmail',
                    'userLogado' => TRUE
                );

                $this->session->set_userdata( $newdata );*/
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('admin'));
            } else {
                $dadosSessao['userLogado'] = null;
                $dadosSessao['userLogado'] = false;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('admin/login'));
            }
        }
    }

}
