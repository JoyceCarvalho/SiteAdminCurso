<?php
defined("BASEPATH") or exit("No direct script access allowed");
class Admin extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){

        if((!isset($_SESSION["logado"])) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $data["menu_ativo"] = "dashboard";
        $data["submenu_ativo"] = "";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/home");
        $this->load->view("template-admin/footer");
    }

    public function usuario(){

        if((!isset($_SESSION['logado'])) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $this->load->model("usuario_model", "usermodel");
        $data["usuario_dados"] = $this->usermodel->listar_usuarios();

        $data["menu_ativo"] = "usuarios";
        $data["submenu_ativo"] = "u_list";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/usuario_list");
        $this->load->view("template-admin/footer");

    }

    public function usuario_form(){

        if((!isset($_SESSION["logado"])) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $data["menu_ativo"] = "usuarios";
        $data["submenu_ativo"] = "u_cad";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/usuario_cad");
        $this->load->view("template-admin/footer");

    }

    public function usuario_edicao(){

        if((!isset($_SESSION["logado"])) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $id = $this->input->post("idusuario");

        $this->load->model("usuario_model", "usermodel");

        $this->usermodel->dados_usuario($id);

        $data["menu_ativo"] = "usuarios";
        $data["submenu_ativo"] = "u_list";

        $data["dados_usuario"] = $this->usermodel->dados_usuario($id);

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/usuario_edit");
        $this->load->view("template-admin/footer");

    }

    public function facilitadores(){

        if(!isset($_SESSION["logado"]) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $this->load->model("facilitador_model", "facilitadormodel");

        $data["facilitador_dados"] = $this->facilitadormodel->listar_facilitador();

        $data["menu_ativo"] = "facilitadores";
        $data["submenu_ativo"] = "f_list";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/facilitador_list");
        $this->load->view("template-admin/footer");

    }

    public function facilitador_form(){

        if(!isset($_SESSION["logado"]) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $data["menu_ativo"] = "facilitadores";
        $data["submenu_ativo"] = "f_cad";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/facilitador_cad");
        $this->load->view("template-admin/footer");

    }

    public function facilitador_edicao(){

        if((!isset($_SESSION["logado"])) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $id = $this->input->post("idfacilitador");

        $this->load->model("facilitador_model", "facilitadormodel");

        $data["facilitador"] = $this->facilitadormodel->dados_facilitador($id);

        $data["menu_ativo"] = "facilitadores";
        $data["submenu_ativo"] = "f_list";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/facilitador_edit");
        $this->load->view("template-admin/footer");

    }

    public function parceiros(){
        
        if(!isset($_SESSION["logado"]) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $this->load->model("parceiros_model", "parceirosmodel");

        $data["parceiro_dados"] = $this->parceirosmodel->listar_parceiros();

        $data["menu_ativo"] = "parceiro";
        $data["submenu_ativo"] = "p_list";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/parceiro_list");
        $this->load->view("template-admin/footer");

    }


    public function parceiros_form(){

        if(!isset($_SESSION["logado"]) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $data["menu_ativo"] = "parceiro";
        $data["submenu_ativo"] = "p_cad";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/parceiro_cad");
        $this->load->view("template-admin/footer");

    }

    public function parceiros_edicao(){
        
        if(!isset($_SESSION["logado"]) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $id = $this->input->post("idparceiros");

        $this->load->model("parceiros_model", "parceiromodel");

        $data["parceiros"] = $this->parceiromodel->dados_parceiros($id);

        $data["menu_ativo"] = "parceiro";
        $data["submenu_ativo"] = "p_list";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/parceiro_edit");
        $this->load->view("template-admin/footer");

    }

    public function curso_form(){
        
        if(!isset($_SESSION["logado"]) and $_SESSION["logado"] != true){
            redirect("/");
        }

        $data["menu_ativo"] = "curso";
        $data["submenu_ativo"] = "c_cad";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/curso_cad");
        $this->load->view("template-admin/footer");

    }

}
