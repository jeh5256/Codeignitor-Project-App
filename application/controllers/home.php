<?php

Class Home extends CI_Controller {
    
    public function index() {
        
        if ($this->session->userdata('logged_in')) {
            $user_id = $this->session->userdata('user_id');
            $data['projects'] = $this->project_model->get_projects();
            $data['tasks'] = $this->task_model->get_all_tasks($user_id);   
        }
        
        $data['main_view'] = 'home_view';
        $this->load->view('templates/main_template', $data);
    }
}