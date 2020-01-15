<?php
    class Urls extends CI_controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Url');
        }
        
        public function view($page = 'index'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            //verifica se existe usuario com sessao ativa
            if($this->session->userdata('id')){
                $data['title'] = ucfirst($page);

                $data['urls'] = $this->Url->show_urls($this->session->userdata('id'));

                $this->load->view('templates/header');
                $this->load->view('pages/'.$page, $data);
                $this->load->view('templates/footer');
            }
            else{
                redirect(base_url().'Users/login');
            }
        }

        //recarregar tabela com a lista de URLs
        public function reload_tabela($page = 'lista'){
            $data['urls'] = $this->Url->show_urls($this->session->userdata('id'));
            $this->load->view('pages/'.$page, $data);
            
        }

        //cadastro de url
        public function new_url(){

            //definicao das validacoes necessarias
            $this->load->library('form_validation');
            $this->form_validation->set_rules('url', 'URL', 'required');

            //verifica se a URL e valida
            $pattern = '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i';
            
            if (!preg_match($pattern, $this->input->post('url'))){
                $this->session->set_flashdata('error', 'URL Inválida');
                $this->view();
            }
            else{
                //executa a validacao
                if($this->form_validation->run()){

                //cria um array com os dados a serem cadastrados
                $user = $this->session->userdata('id'); //id do usuario logado
                $data = array('url' => $this->input->post('url'), 'user' => $user);

                //realiza o cadastro
                $this->Url->insert_url($data);

                $this->session->set_flashdata('success', 'URL Cadastrada com sucesso');
                redirect(base_url().'Urls/view');

                }
                else{
                    $this->session->set_flashdata('error', 'Falha no cadastro da URL');
                    $this->view();
                }
            }
        }

        //excluir url cadastrada
        public function del_url(){

            $data = $this->input->post('id');

            $this->Url->delete_url($data);

            $this->session->set_flashdata('success', 'URL Removida');
            redirect(base_url().'Urls/view');
        }

    }

?>    