<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Postagem extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Categorias_model','modelcategorias');//alias apelido para model categoria como é menu vai ta em todas as telas por isso no construct
		$this->categoria=$this->modelcategorias->listarcategorias();//recebendo tudo que for resgatado pela função listar categorias
	}
	public function index($id, $slug=null)//metodo para carregar a pagina home
	{
		
		$this->load->model('Publicacoes_model', 'publicacoes');
		$dados['cont'] = $this->publicacoes->exibir_post($id);
		$dados['titulo']='Postagem';
		$dados['subtitulo']='';
		$dados['subtitulodb']=$this->publicacoes->listartitulo($id);
		$dados['categoria']=$this->categoria;
		$this->load->view('frontend/template/htmlheader',$dados);//sempre é igual por isso ta no template
		$this->load->view('frontend/template/header');//sempre é igual
		$this->load->view('frontend/postagem');//sempre muda esta é a pagina home do site diferencial desse metodo
		$this->load->view('frontend/template/aside');//sempre é igual
		$this->load->view('frontend/template/footer');//sempre é igual
		$this->load->view('frontend/template/htmlfooter');//sempre igual
	}

}
