<?php

Class Project extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        if (!$this->session->userdata('logged_in')) {
            
            $this->session->set_flashdata('no_access', 'You do not have access to view this page');
            redirect('home/index');
        }
    }
    
    public function index() {

        $data['projects'] = $this->project_model->get_projects();
        $data['main_view'] = 'projects/index';
        $this->load->view('templates/main_template', $data);
    }
    
    public function display($project_id) {

        $data['project_data'] = $this->project_model->get_project($project_id);
        $data['completed_tasks'] = $this->project_model->get_project_tasks($project_id, true);
        $data['incompleted_tasks'] = $this->project_model->get_project_tasks($project_id, false);
        $data['main_view'] = 'projects/display';
        $this->load->view('templates/main_template', $data);
    }
    
    public function create() {
        
        $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('project_body', 'Project Description', 'trim|required|min_length[3]');
        
        if ($this->form_validation->run() == False) {
            
            $data['main_view'] = 'projects/create_project';
            $this->load->view('templates/main_template', $data);
        } else {
            $data = [
                'project_user_id' => $this->session->userdata('user_id'),
                'project_name' => $this->input->post('project_name'),
                'project_body' => $this->input->post('project_body')
            ];
            
            if ($this->project_model->create_project($data)) {
                
                $this->session->set_flashdata('project_created', 'Project Created');
                redirect('project/index');
            }
        }
    }
    
    public function edit($project_id) {
        
        $this->form_validation->set_rules('project_name', 'Project Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('project_body', 'Project Description', 'trim|required|min_length[3]');
        
        if ($this->form_validation->run() == False) {
            
            $data['project_data'] = $this->project_model->get_projects_info($project_id);
            $data['main_view'] = 'projects/edit_project';
            $this->load->view('templates/main_template', $data);
        } else {
            
            $data = [
                'project_user_id' => $this->session->userdata('user_id'),
                'project_name' => $this->input->post('project_name'),
                'project_body' => $this->input->post('project_body')
            ];
            
            if ($this->project_model->edit_project($project_id, $data)) {
                
                $this->session->set_flashdata('project_updated', 'Project Updated');
                redirect('project/index');
            }
        }
    }
    
    public function delete($project_id) {
        
        $this->project_model->delete_project($project_id);
        $this->project_model->delete_all_project_tasks($project_id);
        $this->session->set_flashdata('project_deleted', 'Project and its associated tasks have been deleted');
        redirect('project/index');
    }
}