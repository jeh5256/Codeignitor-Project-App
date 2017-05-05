<?php

Class Tasks extends CI_Controller {
    
    public function display($task_id) {
        
        $data['task'] = $this->task_model->get_task($task_id);
        $data['project_id'] = $this->task_model->get_task_project_id($task_id);
        $data['project_name'] = $this->task_model->get_task_project_name($data['project_id']);
        $data['main_view'] = 'tasks/display';
        $this->load->view('templates/main_template', $data);
    }
    
    public function create($project_id) {
        $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('task_body', 'Task Description', 'trim|required|min_length[3]');
        
        if ($this->form_validation->run() == False) {
            
            $data['main_view'] = 'tasks/create_task';
            $this->load->view('templates/main_template', $data);
        } else {
            $data = [
                'project_id' => $project_id,
                'task_name' => $this->input->post('task_name'),
                'task_body' => $this->input->post('task_body'),
                'due_date' => $this->input->post('due_date')
            ];
            
            if ($this->task_model->create_task($data)) {
                
                $this->session->set_flashdata('task_created', 'Task Created');
                redirect('project/index');
            }
        }
    }
    
    public function edit($task_id) {
        $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('task_body', 'Task Description', 'trim|required|min_length[3]');
        
        if ($this->form_validation->run() == False) {
        
            $data['project_id'] = $this->task_model->get_task_project_id($task_id);
            $data['project_name'] =  $this->task_model->get_task_project_name($data['project_id']);
            $data['task'] = $this->task_model->get_project_data($task_id);
            
            $data['main_view'] = 'tasks/edit_task';
            $this->load->view('templates/main_template', $data);
        } else {
            
            $project_id = $this->task_model->get_task_project_id($task_id);
            $data = [
                'project_id' => $project_id,
                'task_name' => $this->input->post('task_name'),
                'task_body' => $this->input->post('task_body'),
                'due_date' => $this->input->post('due_date')
            ];
            
            if ($this->task_model->edit_task($task_id, $data)) {
                
                $this->session->set_flashdata('task_edited', 'Task Edited');
                redirect('projects/index');
            }
        }
    }
    
    public function delete($project_id, $task_id) {
        
        $this->task_model->delete_task($task_id);
        $this->session->set_flashdata('task_deleted', "Task has been deleted");
        redirect('project/display/' . $project_id);
    }
    
    public function mark_complete($task_id) {
        
        if ($this->task_model->mark_task_complete($task_id)) {
            $project_id = $this->task_model->get_task_project_id($task_id);
            $this->session->set_flashdata('task_done', 'Task Marked as Complete');
            redirect('/project/display/' . $project_id);
        }
    }
    
    public function mark_incomplete($task_id) {
        
        if ($this->task_model->mark_task_incomplete($task_id)) {
            $project_id = $this->task_model->get_task_project_id($task_id);
            $this->session->set_flashdata('task_incomplete', 'Task Marked as Incomplete');
            redirect('/project/display/' . $project_id);
        }
    }
}