 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model('Categorias_model','modelcategorias');//alias apelido para model categoria como é menu vai ta em todas as telas por isso no construct
		$this->categoria=$this->modelcategorias->listarcategorias();//recebendo tudo que for resgatado pela função listar categorias
	}
	public function index()//metodo para carregar a pagina home
	{
		$dados['categoria']=$this->categoria;//colocando os resultados dentro de um araay chamado dado na posição categorias
		$this->load->model('publicacoes_model');
		$dados['postagem']=$this->publicacoes_model->destaques_home();//colocar o resultado na mesma matriz porem em outra linha chamada destaques
		//estes dados so serão utilizados na pagina home por isso so estão dentro desse metodo que chama a home

		//dados para o cabeçalho
		$dados['titulo']='Página inicial';
		$dados['subtitulo']='Postagens recentes pau no cu';

		$this->load->view('frontend/template/htmlheader',$dados);//sempre é igual por isso ta no template
		$this->load->view('frontend/template/header');//sempre é igual
		$this->load->view('frontend/home');//sempre muda esta é a pagina home do site diferencial desse metodo
		$this->load->view('frontend/template/aside');//sempre é igual
		$this->load->view('frontend/template/footer');//sempre é igual
		$this->load->view('frontend/template/htmlfooter');//sempre igual
	}

}
