<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Imagem_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
    }

    /**
     * cadastrar imagens no banco
     *
     * @param array $dados
     * @return boolean
     */
    public function cadastrar_imagem($dados){
        $this->db->insert("tbfoto", $dados);
        return $this->db->insert_id();
    }

    /**
     * Listar dados da imagem
     *
     * @param int $id
     * @return object
     */
    public function listar_imagem($id){
        $this->db->from("tbfoto");
        $this->db->where("id", $id);
        return $this->db->get('')->row();
    }

    /**
     * alterar dados imagem
     *
     * @param array $dados
     * @param int $id
     * @return object
     */
    public function alterar_imagem($dados, $id){
        $this->db->where("id", $id);
        return $this->db->update("tbfoto", $dados);
    }

    /**
     * excluir imagem
     *
     * @param int $id
     * @return boolean
     */ 
    public function excluir_imagem($id){
        $this->db->where("id", $id);
        return $this->db->delete("tbfoto");
    }

}
