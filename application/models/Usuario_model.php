<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Usuario_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
    }

    /**
     * Cadastro de usuarios no banco de dados
     *
     * @param array $dados
     * @return int
     */
    public function cadastrar_usuarios($dados){
        
        $insert = array(
            "nome"      => $dados["nome"],
            "usuario"   => $dados["usuario"],
            "senha"     => $this->hash_password($dados["senha"]),
            "email"     => $dados["email"]
        );

        $this->db->insert("cpanel_user" ,$insert);
        return $this->db->insert_id();

    }

    /**
     * Edição de dados dos usuários cadastrados no sistema
     *
     * @param array $dados
     * @return int
     */
    public function editar_usuarios($dados){
        
        $update = array(
            "nome"      => $dados["nome"],
            "usuario"   => $dados["usuario"],
            "email"     => $dados["email"]
        );

        $id = $dados['idusuario'];

        $this->db->where("id", $id);
        return $this->db->update("cpanel_user", $update);

    }

    /**
     * Exclui usuários do sistema
     *
     * @param array $dados
     * @return boolean
     */
    public function excluir_usuarios($dados){
        $id = $dados["idusuario"];

        $this->db->where("id", $id);
        return $this->db->delete("cpanel_user");
    }

    /**
     * Verifica se o usuario e senha fornecidos conferem com os dados do banco
     *
     * @param array $dados
     * @return int
     */
    public function verifica_dados($usuario, $senha){

        $this->db->select("senha");
        $this->db->from("cpanel_user");
        $this->db->where('usuario', $usuario);

        $hash = $this->db->get('')->row('senha');

        return $this->verify_password_hash($senha, $hash);

    }

    /**
     * Lista todos os usuários cadastrados no banco de dados
     *
     * @return object
     */
    public function listar_usuarios(){
        $this->db->from("cpanel_user");
        return $this->db->get('')->result();
    }

    /**
     * Retorna os dados de determinado usuario
     *
     * @param string $usuario
     * @return object
     */
    public function dados_usuario($usuario){
        
        $this->db->from('cpanel_user');
        $this->db->where("id = '{$usuario}'");
        $this->db->limit(1);

        return $this->db->get('')->row();
    }

    /**
     * função para inserir hash na senha.
     * 
     * @access public
     * @param mixed $password
     * @return string|bool se o hash for concluido com sucesso retorna string, se não o boleano falso em caso de falha
     */
    public function hash_password($senha) {
        
        return password_hash($senha, PASSWORD_BCRYPT);
        
    }
    
    /**
     * Verifica se a senha de entrada é igual a senha cadastrada no banco.
     * 
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
    private function verify_password_hash($senha, $hash) {
        
        return password_verify($senha, $hash);
        
    }
}
