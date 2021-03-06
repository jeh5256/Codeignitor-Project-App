<h2>Create Task</h2>

 
<?php

    $attributes = ['id'=> 'create_task_form', 'class'=> 'form_horizontal'];
    
    echo '<div class="bg-danger">' . validation_errors() . '</div>';
    
    if ($this->session->flashdata('errors')) {
        echo $this->session->flashdata('errors');
    }

    echo form_open('tasks/create/' . $this->uri->segment(3), $attributes);
    
    echo '<div class="form-group">';
        echo form_label('Task Name');
        $data = ['class'=> 'form-control', 'name'=>'task_name'];
        echo form_input($data);
    echo '</div>';
    
    echo '<div class="form-group">';
        echo form_label('Task Due Date');
        $data = ['class'=> 'form-control', 'name'=>'due_date', 'type'=> 'date'];
        echo form_input($data);
    echo '</div>';
    
    echo '<div class="form-group">';
        echo form_label('Task Description');
        $data = ['class'=> 'form-control', 'name'=>'task_body'];
        echo form_textarea($data);
    echo '</div>';
    
    echo '<div class="form-group">';
        $data = ['class'=> 'btn btn-primary', 'name'=>'create', 'value'=>'Create Task'];
        echo form_submit($data);
    echo '</div>';
    
    echo form_close();