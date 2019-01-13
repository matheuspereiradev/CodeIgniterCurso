<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function exibirautor($id) {

        return $this->db->get_where('usuario', array('id' => $id))->result();
    }

    public function nomeautor($id) {
        $this->db->select('id, nome');
        $this->db->from('usuario');
        $this->db->where('id =' . $id);
        return $this->db->get()->result();
    }

}
