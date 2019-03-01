<?php
defined('BASEPATH') or exit("No direct script access allowed");

class Facilitador_model extends CI_Model {
    
    public function __construct(){
        parent::__construct();
    }

    /**
     * Cadastro de facilitadores dos cursos/treinamentos
     *
     * @param array $dados
     * @return boolean
     */
    public function cadastrar_facilitador($dados){
        return $this->db->insert("tbfacilitador", $dados);
    }

    /**
     * Listagem de Facilitadores
     *
     * @return object
     */
    public function listar_facilitador(){
        $this->db->from("tbfacilitador");
        return $this->db->get()->result();
    }

    /**
     * Atualizar dados no banco
     *
     * @param array $dados
     * @param int $id
     * @return boolean
     */
    public function editar_facilitador($dados, $id){
        $this->db->where("id", $id);
        return $this->db->update("tbfacilitador", $dados);
    }

    /**
     * Excluir dados do banco
     *
     * @param int $id
     * @return boolean
     */
    public function excluir_facilitador($id){
        $this->db->where("id", $id);
        return $this->db->delete("tbfacilitador");
    }

    /**
     * Retorna dados de facilitador
     *
     * @param int $id
     * @return object
     */
    public function dados_facilitador($id){
        $this->db->from("tbfacilitador");
        $this->db->where("id", $id);
        return $this->db->get()->row();
    }
}
