<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function exibirautor($id) {//o get where nao da pra escolher os cmpos entrao so é indicado se vc quiser todos eles
        return $this->db->get_where('usuario', array('id' => $id))->result();
    }

    public function buscar($id) {
        $this->db->from('usuario');
        $this->db->where('md5(id)', $id);
        return $this->db->get()->result();
    }

    public function buscarAlgumasInformacoes($id) {
        $this->db->select('id, nome,email, historico,user');
        $this->db->from('usuario');
        $this->db->where('md5(id)', $id);
        return $this->db->get()->result();
    }

    public function listarautores() {
        $this->db->select('id, nome, img, email');
        $this->db->from('usuario');
        $this->db->order_by('nome', 'ASC');
        return $this->db->get()->result();
    }

    public function nomeautor($id) {
        $this->db->select('id, nome');
        $this->db->from('usuario');
        $this->db->where('id =' . $id);
        return $this->db->get()->result();
    }

    public function buscarUsrLogin($usuario, $senha) {
        $this->db->where('user', $usuario);
        $this->db->where('senha', sha1(md5($senha)));
        return $this->db->get('usuario')->result();
    }

    public function inserir($nome, $email, $historico, $user, $senha) {
        $usuario['nome'] = $nome;
        $usuario['email'] = $email;
        $usuario['historico'] = $historico;
        $usuario['user'] = $user;
        $usuario['senha'] = sha1(md5($senha));
        return $this->db->insert('usuario', $usuario);
    }

    public function editar($id, $nome, $email, $historico, $user, $senha) {

        $usuario['nome'] = $nome;
        $usuario['email'] = $email;
        $usuario['historico'] = $historico;
        $usuario['user'] = $user;
        $usuario['senha'] = sha1(md5($senha));
        $this->db->where('id', $id);
        return $this->db->update('usuario', $usuario);
    }

    public function excluir($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->delete('usuario');
    }

}
