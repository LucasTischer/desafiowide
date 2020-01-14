<?php
    class Users extends CI_controller{

        public function login(){

            $data['title'] = 'Interwebs | Login';
            $this->load->view('pages/login.php', $data);

        }

        public function login_validation(){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('senha', 'Senha', 'required');
            
            if($this->form_validation->run()){
                $email = $this->input->post('email');
                $senha = $this->input->post('senha');
                echo "validacao";
                $this->load->model('User');
                
                if($this->User->can_login($email, $senha)){
                    $session_data = array('email' => $email);
                    $this->session->set_userdata($session_data);
                    redirect(base_url().'Pages/view');
                }
                else{
                    $this->session->set_flashdata('error', 'Email e senha invalidos');
                    redirect(base_url().'Users/login');

                }
            }
            else{
                $this->login();
            }
        }

        public function logout(){

            $this->session->unset_userdata('email');
            redirect(base_url().'Users/login');

        }
    }