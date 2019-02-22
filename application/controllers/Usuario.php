<?php 
defined("BASEPATH") or exit("No direct script access allowed");

class Usuario extends CI_Controller {
    
    function __construct(){
        parent::__construct();
    }

    public function index(){

        if(isset($_SESSION["logado"]) and $_SESSION["logado"] == true){
            redirect('admin');
        }

        $this->load->view("template-admin/html_header");
        $this->load->view("admin/logar");
        $this->load->view("template-admin/footer");

    }

    public function usuario_login(){

        if(isset($_SESSION["logado"]) and $_SESSION["logado"] == true){
            redirect("admin");
        }

        $this->load->model("usuario_model", "usermodel");

        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'usuario',
                'label' => 'USUÁRIO',
                'rules' => 'required'
            ),
            array(
                'field' => 'senha',
                'label' => 'SENHA',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() === FALSE){

            $this->load->view("template-admin/html_header");
            $this->load->view("admin/logar");
            $this->load->view("template-admin/footer");
        } else {
            
            if($this->usermodel->verifica_dados($this->input->post("usuario"), $this->input->post("senha"))){

                $user = $this->usermodel->dados_usuario($this->input->post("usuario"));
                
                $_SESSION["id_usuario"] = $user->id;
                $_SESSION["usuario"]    = $user->usuario;
                $_SESSION["nome"]       = $user->nome;
                $_SESSION['logado']     = (bool)true;
                
                redirect("admin");

            } else {
                
                $this->session->set_flashdata("error", "Usuário ou senha incorretos!");
                redirect("/");

            }

        }

    }

    public function usuario_cadastro(){

        if(!isset($_SESSION["logado"]) and ($_SESSION["logado"] != true)){
            redirect("/");
        }

        $this->load->model("usuario_model", "usermodel");
        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome Completo',
                'rules' => 'required|alpha'
            ),
            array(
                'field' => 'usuario',
                'label' => 'Usuário',
                'rules' => 'required|alpha_numeric'
            ),
            array(
                'field' => 'senha',
                'label' => 'Senha',
                'rules' => 'required|alpha_numeric',
                'errors' => array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() === FALSE){

            $this->session->set_flashdata("error", "Erro! Não foi possivel cadastrar o usuário!");

            redirect("user_insert");

        } else {

            if($this->usermodel->cadastrar_usuarios($this->input->post())){
                
                $this->session->set_flashdata('success', "Usuário cadastrado com sucesso");

                redirect("user_insert");

            } else {
                $this->session->set_flashdata("error", "Ocorreu um Erro! Não foi possível cadastrar o usuário!");
                redirect("user_insert");
            }

        }
        
    }

    public function usuario_atualizar(){

        if(!isset($_SESSION["logado"]) and $_SESSION["logado"] != true){
            redirect("/");
        }
        
        $this->load->model("usuario_model", "usermodel");

        if($this->usermodel->editar_usuarios($this->input->post())){
            $this->session->set_flashdata("success", "Usuário editado com sucesso!");
        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro! Não é possível editar este usuário!');
        }

        redirect('user_list');

    }

    public function usuario_logout(){
        
        // cria o objeto data
        $data = new stdClass();

        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {

            // remove session datas
            foreach ($_SESSION as $key) {
                unset($_SESSION[$key]);
            }

            session_destroy();

            // logout com sucesso
            redirect('/');

        } else {

            // aqi o usuario não esta logado nos não podemos deslogado,
            // redirecionamos ele para a raiz
            redirect('/');

        }
    }

}