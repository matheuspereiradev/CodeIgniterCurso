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
    public function inserir() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nomecategoria', 'Nome da categoria','required|min_length[3]|max_length[100]|is_unique[categoria.titulo]');//nome do input. apelido que vai exibir prousuario
        if($this->form_validation->run()==false){
            $this->index();//chama o metodo index daqui
        }else{
            $titulo= $this->input->post('nomecategoria');//pegando os valores que vem do formulario
            if($this->categorias->adicionar($titulo)){//usar metodo domodel
                redirect(base_url('admin/categoria'));
            }else{
                echo "Erro ao inserir dados";
            }
            
        }
        
    }
    public function excluir($id) {
        if($this->categorias->excluir($id)){
                redirect(base_url('admin/categoria'));
            }else{
                echo "Erro ao inserir dados";
            }
    }

}
