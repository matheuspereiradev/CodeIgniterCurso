<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function buscarUsrLogin($usuario, $senha) {
        $this->db->where('user', $usuario);
        $this->db->where('senha', $senha);
        return $this->db->get('usuario')->result();
    }
}
