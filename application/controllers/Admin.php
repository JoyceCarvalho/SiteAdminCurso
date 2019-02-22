<?php
defined("BASEPATH") or exit("No direct script access allowed");
class Admin extends CI_Controller {
    
    function __construct(){
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

        $data["menu_ativo"] = "facilitadores";
        $data["submenu_ativo"] = "f_cad";

        $this->load->view("template-admin/html_header", $data);
        $this->load->view("template-admin/header");
        $this->load->view("template-admin/aside");
        $this->load->view("admin/facilitador_cad");
        $this->load->view("template-admin/footer");

    }

}
