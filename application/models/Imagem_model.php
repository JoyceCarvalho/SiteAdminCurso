<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Imagem_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
    }

    public function cadastrar_imagem($dados){
        $this->db->insert("tbfoto", $dados);
        return $this->db->insert_id();
    }

    public function listar_imagem($id){
        $this->db->from("tbfoto");
        $this->db->where("id", $id);
        return $this->db->get('')->row();
    }

}
