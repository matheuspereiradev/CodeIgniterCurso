<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {

//variaveis publicas dos campos
    public $id;
    public $titulo;

    public function __construct() {
        parent::__construct();
    }

    public function listarcategorias() {
        $this->db->order_by('titulo', 'ASC'); //ORDENAR OS RESULTADOS EM ORDEM ALFABÉTICA DO CAMPO TITULO EM SQL "ORDER BY 'titulo' ASC "
        $resultado = $this->db->get('categoria');
        if ($resultado->num_rows() > 0) {
            return $resultado->result();
        }
        return;
    }

    public function listartitulo($id) {
        $this->db->from('categoria');
        $this->db->where('id = ' . $id);
        return $this->db->get()->result();
    }

    public function adicionar($titulo) {
        $dados['titulo'] = $titulo;
        return $this->db->insert('categoria', $dados); //inserir na tabela categoria o array dados
    }

    public function excluir($id) {
        $this->db->where('md5(id)',$id);
        return $this->db->delete('categoria');
    }

}
