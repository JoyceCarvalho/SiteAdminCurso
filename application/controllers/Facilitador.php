<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Facilitador extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function facilitador_cadastro(){

        $this->load->model("imagem_model", "imagemodel");

        // Constantes
        define('TAMANHO_MAXIMO', (2 * 1024 * 1024));
        
        // Verificando se selecionou alguma imagem
        if (!isset($_FILES['foto_fac'])){
            $this->session->set_flashdata('warning', 'Selecione uma imagem!');
            redirect("facilitador_insert");
        }
        
        // Recupera os dados dos campos
        $foto = $_FILES['foto_fac'];
        $nome = $foto['name'];
        $tipo = $foto['type'];
        $tamanho = $foto['size'];
        
        // Validações básicas
        // Formato
        if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/', $tipo)) {
            $this->session->set_flashdata("error", 'Isso não é uma imagem válida');
            redirect("facilitador_insert");
        }
        
        // Tamanho
        if ($tamanho > TAMANHO_MAXIMO){
            $this->session->set_flashdata('error', 'A imagem deve possuir no máximo 2 MB');
            redirect("facilitador_insert");
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

        if($imagem){

            $this->load->model('facilitador_model', 'facilitadormodel');

            $dados = array(
                "nome"      => $this->input->post("nome"),
                "graduacao" => $this->input->post("formacao"),
                "facebook"  => $this->input->post("facebook"),
                "linkedin"  => $this->input->post("linkedin"),
                "fk_idfoto" => $imagem
            );

            if($this->facilitadormodel->cadastrar_facilitador($dados)){

                $this->session->set_flashdata("success", "Facilitador cadastrado com sucesso!");
                redirect("facilitador_insert");

            } else {

                $this->session->set_flashdata("error", "Ocorreu um erro ao cadastrar o facilitador! Favor entre em contato com o suporte.");
                redirect("facilitador_insert");

            }

        } else {

            $this->session->set_flashdata("error", "Ocorreu um erro ao cadastrar o facilitador! Favor entre em contato com o suporte.");
            redirect("facilitador_insert");

        }

    }

    public function facilitador_atualizar(){

        if((!isset($_SESSION["logado"])) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $this->load->model("facilitador_model", "facilitadormodel");

        $arrayDados = array(
            "nome"      => $this->input->post("nome"),
            "graduacao" => $this->input->post("formacao"),
            "facebook"  => $this->input->post("facebook"),
            "linkedin"  => $this->input->post("linkedin")
        );

        if(!empty($this->input->post("foto_fac"))) {

            $arrayDados["fk_idfoto"] = $this->input->post("foto_fac");

        }

        if($this->facilitadormodel->editar_facilitador($arrayDados, $this->input->post("idfacilitador"))){

            $this->session->set_flashdata("success", "Dados editados com sucesso!");
            redirect("facilitador_list");

        } else {

            $this->session->set_flashdata("error", "Ocorreu um problema ao atualizar os dados!");
            redirect("facilitador_list");
            
        }

    }

    public function facilitador_excluir(){

        if(!isset($_SESSION["logado"]) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $idfacilitador = $this->input->post("idfacilitador");

    }

}
