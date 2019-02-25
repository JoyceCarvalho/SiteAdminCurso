<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Imagem extends CI_Controller {
    
    public function __contruct(){
        parent::__construct();
    }

    public function img($id){
        
        $this->load->model("imagem_model", "imagemodel");
        
        // Se executado
        $foto = $this->imagemodel->listar_imagem($id);
        /*print_r($foto);
        exit();*/
        // Definindo tipo do retorno
        header('Content-Type: '. $foto->tipo);
        
        // Retornando conteudo
        echo $foto->conteudo;
          
    }

}
