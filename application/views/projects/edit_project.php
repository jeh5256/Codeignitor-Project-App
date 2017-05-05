<h2>Edit Project</h2>

 
<?php

    $attributes = ['id'=> 'edit_form', 'class'=> 'form_horizontal'];
    
    echo '<div class="bg-danger">' . validation_errors() . '</div>';
    
    if ($this->session->flashdata('errors')) {
        echo $this->session->flashdata('errors');
    }

    echo form_open('project/edit/' . $project_data->id, $attributes);
    
    echo '<div class="form-group">';
        echo form_label('Project Name');
        $data = ['class'=> 'form-control', 'name'=>'project_name', 'value'=> $project_data->project_name];
        echo form_input($data);
    echo '</div>';
    
    echo '<div class="form-group">';
        echo form_label('Project Description');
        $data = ['class'=> 'form-control', 'name'=>'project_body', 'value'=> $project_data->project_body];
        echo form_textarea($data);
    echo '</div>';
    
    echo '<div class="form-group">';
        $data = ['class'=> 'btn btn-primary', 'name'=>'edit', 'value'=>'Edit'];
        echo form_submit($data);
    echo '</div>';
    
    echo form_close();