<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Parceiros_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
    }

    /**
     * Cadastro de parceiro
     *
     * @param array $dados
     * @return boolean
     */
    public function cadastrar_parceiros($dados){
        return $this->db->insert("tbparceiros", $dados);
    }

    /**
     * Listagem de Parceiros
     *
     * @return object
     */
    public function listar_parceiros(){
        $this->db->from("tbparceiros");
        return $this->db->get()->result();
    }

    /**
     * Edição de parceiros
     *
     * @param array $dados
     * @param int $id
     * @return boolean
     */
    public function editar_parceiros($dados, $id){
        $this->db->where("id", $id);
        return $this->db->update("tbparceiros", $dados);
    }

    /**
     * Exclusão de parceiros
     *
     * @param int $id
     * @return boolean
     */
    public function excluir_parceiros($id){
        $this->db->where("id", $id);
        return $this->db->delete("tbparceiros");
    }

    /**
     * Listar dados do parceiro
     *
     * @param int $id
     * @return object
     */
    public function dados_parceiros($id){
        $this->db->from("tbparceiros");
        $this->db->where("id", $id);
        return $this->db->get()->row();
    }   

}
