<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Parceiro extends CI_Controller {
    
    public function __construct(){
        parent::__construct();

        $this->load->model("parceiros_model", "parceirosmodel");
    }

    public function parceiro_cadastro(){
        
        if(!isset($_SESSION["logado"]) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        /**
         * Begin cadastro de imagem
         */
        $this->load->model("imagem_model", "imagemodel");

        // Constantes
        define('TAMANHO_MAXIMO', (2 * 1024 * 1024));
        
        // Verificando se selecionou alguma imagem
        if (!isset($_FILES['logo'])){
            $this->session->set_flashdata('warning', 'Selecione uma imagem!');
            redirect("parceiros_insert");
        }
        
        // Recupera os dados dos campos
        $foto = $_FILES['logo'];
        $nome = $foto['name'];
        $tipo = $foto['type'];
        $tamanho = $foto['size'];
        
        // Validações básicas
        // Formato
        if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $tipo)) {
            $this->session->set_flashdata("error", 'Isso não é uma imagem válida');
            redirect("parceiros_insert");
        }
        
        // Tamanho
        if ($tamanho > TAMANHO_MAXIMO){
            $this->session->set_flashdata('error', 'A imagem deve possuir no máximo 2 MB');
            redirect("parceiros_insert");
        }
        
        // Transformando foto em dados (binário)
        $conteudo = file_get_contents($foto['tmp_name']);

        $array_imagem = array(
            "nome"      => $nome,
            "conteudo"  => $conteudo,
            "tipo"      => $tipo,
            "tamanho"   => $tamanho
        );

        $imagem = $this->imagemodel->cadastrar_imagem($array_imagem);
        /**
         * End cadastro de imagem
         */

        if($imagem){

            $arrayDados = array(
                "nome"      => $this->input->post("nome"),
                "site"      => $this->input->post("site"),
                "fk_idfoto" => $imagem
            );
    
            if($this->parceirosmodel->cadastrar_parceiros($arrayDados)){
                $this->session->set_flashdata("success", "Parceiro cadastrado com sucesso!");
                redirect("parceiros_insert");
            } else {
                $this->session->set_flashdata("error", "Ocorreu um erro ao cadastrar parceiro! Favor entre em contato com o suporte e tente novamente mais tarde.");
                redirect("parceiros_insert");
            }

        } else {
            $this->session->set_flashdata("error", "Ocorreu um erro ao cadastrar parceiro! Favor entre em contato com o suporte e tente novamente mais tarde");
        }

    }

    public function parceiro_atualizar(){

        if(!isset($_SESSION["logado"]) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $arrayDados = array(
            "nome" => $this->input->post("nome"),
            "site" => $this->input->post("site")
        );

        if(!empty($this->input->post("logo"))){

            /**
             * Begin cadastro de imagem
             */
            $this->load->model("imagem_model", "imagemodel");

            // Constantes
            define('TAMANHO_MAXIMO', (2 * 1024 * 1024));
            
            // Verificando se selecionou alguma imagem
            if (!isset($_FILES['logo'])){
                $this->session->set_flashdata('warning', 'Selecione uma imagem!');
                redirect("parceiros_insert");
            }
            
            // Recupera os dados dos campos
            $foto = $_FILES['logo'];
            $nome = $foto['name'];
            $tipo = $foto['type'];
            $tamanho = $foto['size'];
            
            // Validações básicas
            // Formato
            if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $tipo)) {
                $this->session->set_flashdata("error", 'Isso não é uma imagem válida');
                redirect("parceiros_insert");
            }
            
            // Tamanho
            if ($tamanho > TAMANHO_MAXIMO){
                $this->session->set_flashdata('error', 'A imagem deve possuir no máximo 2 MB');
                redirect("parceiros_insert");
            }
            
            // Transformando foto em dados (binário)
            $conteudo = file_get_contents($foto['tmp_name']);

            $array_imagem = array(
                "nome"      => $nome,
                "conteudo"  => $conteudo,
                "tipo"      => $tipo,
                "tamanho"   => $tamanho
            );

            $imagem = $this->imagemodel->cadastrar_imagem($array_imagem);
            /**
             * End cadastro de imagem
             */

            if($imagem){
                $arrayDados["fk_idfoto"] = $imagem;
            } else {
                $this->session->set_flashdata("warning", "Ocorreu um erro! A imagem não pode ser carregada, entre em contato com o suporte e tente mais tarde novamente!");
            }

        }

        if($this->parceirosmodel->editar_parceiros($arrayDados, $this->input->post("idparceiros"))){
            $this->session->set_flashdata("success", "Parceiro editado com sucesso!");
            redirect("parceiros_list");
        } else {
            $this->session->set_flashdata("error", "Ocorreu um problema ao editar parceiros! Favor entre em contato com o suporte e tente novamente mais tarde");
            redirect("parceiros_list");
        }

    }

    public function parceiro_excluir(){

        if(!isset($_SESSION["logado"]) and $_SESSION["logado"] != true){
            redirect("/");
        }

        $id = $this->input->post("idparceiros");

        if(!empty($id)){
            if($this->parceirosmodel->excluir_parceiros($id)){

                $this->session->set_flashdata("success", "Parceiro excluido com sucesso!");
                redirect("parceiros_list");
                
            } else {
                $this->session->set_flashdata("error", "Ocorreu um problema ao excluir parceiro! Entre em contato com o suporte e tente novamente mais tarde!");
                redirect("parceiros_list");
            }
        } else {
            $this->session->set_flashdata("error", "Parceiro não encontrado! Entre em contato com o suporte e tente novamente mais tarde");
            redirect("parceiro_list");
        }

    }

}
