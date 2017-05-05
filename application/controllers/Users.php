<?php

Class Users extends CI_Controller{
    
    public function register() {
        
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirm  Password', 'trim|required|matches[password]');
        
        if ($this->form_validation->run() == False) {
            
            $data['main_view'] = 'users/register_view';
            $this->load->view('templates/main_template', $data);
        } else {
            $this->load->model('user_model');
            if ($this->user_model->create_user()) {
            
                $this->session->set_flashdata('user_registered', "User account created");
                redirect('home/index');
            }
        }
    }
    
    public function login() {
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]', 'Please enter a valid username');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]', 'Please enter a valid password');
        $this->form_validation->set_rules('confirm_password', 'Confirm  Password', 'trim|required|matches[password]', 'Please enter a valid password');
        
        if ($this->form_validation->run() == False) {
            
            $data = ['errors' => validation_errors()];
            $this->session->set_flashdata($data);
            redirect('home');
        } else {
            
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('user_model');
            $user_id = $this->user_model->login_user($username, $password);
            
            if ($user_id) {
                $user_data = [
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                ];
                
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('login_success', 'You are now logged in');
                
                redirect('home/index');
                
            } else {
                $this->session->set_flashdata('login_failed', 'You were not logged in');
                redirect('home/index');
            }
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('home/index');
    }
}