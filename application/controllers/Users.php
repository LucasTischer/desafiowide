<?php
    class Users extends CI_controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model('User');
        }

        //acessar pagina de login
        public function login(){

            $data['title'] = 'Interwebs | Login';
            $this->load->view('pages/login.php', $data);
        }

        //validacao do formulario de login
        public function login_validation(){

            //definicao das validacoes necessarias
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('senha', 'Senha', 'required');
            
            //executa as validacoes
            if($this->form_validation->run()){

                $email = $this->input->post('email');
                $senha = sha1($this->input->post('senha'));
                
                //verifica as credenciais no banco de dados e caso o usuario 
                //for encontrado cria uma sessao com o seu id
                //e direciona para a pagina inicial
                if($this->User->can_login($email, $senha)){

                    $data = $this->User->select_user($email);

                    $session_data = array('id' => $data['0']->id);
                    $this->session->set_userdata($session_data);
                    redirect(base_url().'Urls/view');
                }
                //se nao encontrado retorna ao login e mosta erro de login invalido
                else{
                    $this->session->set_flashdata('error', 'Credenciais inválidas');
                    redirect(base_url().'Users/login');

                }
            }
            else{
                $this->login();
            }
        }

        //finaliza a sessao do usuario e volta ao login
        public function logout(){

            $this->session->unset_userdata('id');
            redirect(base_url().'Users/login');
        }

        //cadastro de novo usuario
        public function sign_up(){

             //definicao das validacoes necessarias
             $this->load->library('form_validation');
             $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|alpha');
             $this->form_validation->set_rules('emailcadastro', 'Email', 'required|valid_email|is_unique[users.email]');
             $this->form_validation->set_rules('senhacadastro', 'Senha', 'required|min_length[6]');
             $this->form_validation->set_rules('senha2', 'Repita a senha', 'required|matches[senhacadastro]');

             //executa as validacoes
             if($this->form_validation->run()){

                //cria um array com os dados a serem cadastrados
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => sha1($this->input->post('senhacadastro')),
                    'email' => $this->input->post('emailcadastro')
                );

                //realiza o cadastro
                $this->User->insert_user($data);
                $this->session->set_flashdata('success', 'Cadastro realizado com sucesso');
                redirect(base_url().'Users/login');

             }
             else{
                 $this->login();
                 $this->session->set_flashdata('error', 'Falha no cadastro');
             }
        }
    }