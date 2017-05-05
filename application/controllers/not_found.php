<?php

Class Not_found extends CI_Controller {
    
    public function index() {
        $data['main_view'] = '404_view';
        $this->load->view('templates/main_template', $data);
    }
}