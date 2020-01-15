<?php
    class Urls extends CI_controller{
        public function view($page = 'index'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            //verifica se existe usuario com sessao ativa
            if($this->session->userdata('id')){
                $data['title'] = ucfirst($page);

                $this->load->model('Url');
                $data['urls'] = $this->Url->show_urls($this->session->userdata('id'));

                $this->load->view('templates/header');
                $this->load->view('pages/'.$page, $data);
                $this->load->view('templates/footer');
            }
            else{
                redirect(base_url().'Users/login');
            }
        }

        //cadastro de url
        public function new_url(){

            //definicao das validacoes necessarias
            $this->load->library('form_validation');
            $this->form_validation->set_rules('url', 'URL', 'required');

            //executa a validacao
            if($this->form_validation->run()){

               //cria um array com os dados a serem cadastrados
               $user = $this->session->userdata('id'); //id do usuario logado
               $data = array('url' => $this->input->post('url'), 'user' => $user);

               $this->load->model('Url');

               //realiza o cadastro
               $this->Url->insert_url($data);

               $this->session->set_flashdata('success', 'URL Cadastrada com sucesso');
               redirect(base_url().'Urls/view');

            }
            else{
                $this->view();
                $this->session->set_flashdata('error', 'Falha no cadastro da URL');
            }
        }

    }

?>    