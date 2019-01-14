<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Categorias_model','categorias');
        
    }

    public function index() {//metodo para carregar a pagina home
        $this->load->library('table');
        $dados['titulo'] = 'Painel administartivo';
        $dados['subtitulo'] = 'categoria';
        $dados['categorias']= $this->categorias->listarcategorias();
        $this->load->view('backend/template/htmlheader',$dados); //sempre é igual por isso ta no template
        $this->load->view('backend/template/templatemenu'); //sempre é igual
        $this->load->view('backend/categoria'); //sempre muda esta é a pagina home do site diferencial desse metodo
        $this->load->view('backend/template/htmlfooter'); //sempre igual
    }

}
