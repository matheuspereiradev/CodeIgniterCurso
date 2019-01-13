<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacoes_model extends CI_Model {

//variaveis publicas dos campos
	public $id;
	public $categoria;
	public $titulo;
	public $subtitulo;
	public $conteudo;
	public $data;
	public $img;
	public $user;

	public function __construct(){
		parent::__construct();
	}

	public function destaques_home(){
		//aqui é um join a diferença o select pro get é que o seelect é em muitas tabelas e o get é em uma unica
		$this->db->select('usuario.id as idautor, usuario.nome as nomeautor, postagens.id as idpost, postagens.titulo as titulo, postagens.subtitulo as subtitulo, postagens.user as user,
			postagens.data as data, postagens.img');
		$this->db->from('postagens');
		$this->db->join('usuario', 'usuario.id=postagens.user');//aqui faz o join juntando com a postagem colocando o nome da tabela depois o where

		$this->db->limit(4);
		$this->db->order_by('data', 'DESC');
		$resultado = $this->db->get('');
		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		return;
	}

	/* CONSULTA EM UMA TABELA COM LIMITES
	public function destaques_home(){
		$this->db->limit(4);
		$this->db->order_by('data', 'DESC');
		$resultado = $this->db->get('postagens');
        if ($resultado->num_rows() > 0) {
            return $resultado->result();
        }
        return;
	}
*/

	public function categoria_pub($id){
		$this->db->select('usuario.id as idautor, usuario.nome as nomeautor, postagens.id as idpost, postagens.titulo as titulo, postagens.subtitulo as subtitulo, postagens.user as user,
			postagens.data as data, postagens.img, postagens.categoria');
		$this->db->from('postagens');
		$this->db->join('usuario', 'usuario.id=postagens.user');//aqui faz o join juntando com a postagem colocando o nome da tabela depois o where

		$this->db->where('postagens.categoria = '.$id);
		$this->db->order_by('data', 'DESC');
		$resultado = $this->db->get();
		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		return;
	}

	public function exibir_post($id){
		$this->db->select('postagens.id as id, postagens.categoria as categoria, postagens.titulo as titulo, postagens.conteudo as conteudo, postagens.data as data, postagens.img as img, postagens.user as user, usuario.nome as nome, usuario.id as idusuario, postagens.subtitulo as resumo');
		$this->db->from('postagens');
		$this->db->join('usuario', 'usuario.id=postagens.user');
		//$this->db->order_by('')
		$this->db->where('postagens.id = '.$id);
		$resultado= $this->db->get();
		if ($resultado->num_rows() > 0) {
			return $resultado->result();
		}
		return;
	}

	public function listartitulo($id){
		$this->db->select('id, titulo');
		$this->db->from('postagens');
		$this->db->where('id = '. $id);
		return $this->db->get()->result();
	}
}
