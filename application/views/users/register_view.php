<h2>Register</h2>

 
<?php

    $attributes = ['id'=> 'register_form', 'class'=> 'form_horizontal'];
    
    echo '<div class="bg-danger">' . validation_errors() . '</div>';
    
    if ($this->session->flashdata('errors')) {
        echo $this->session->flashdata('errors');
    }

    echo form_open('users/register', $attributes);
    
    echo '<div class="form-group">';
        echo form_label('First Name');
        $data = ['class'=> 'form-control', 'name'=>'first_name', 'value'=> set_value('first_name')];
        echo form_input($data);
    echo '</div>';
    
    echo '<div class="form-group">';
        echo form_label('Last Name');
        $data = ['class'=> 'form-control', 'name'=>'last_name', 'value'=> set_value('last_name')];
        echo form_input($data);
    echo '</div>';
    
    echo '<div class="form-group">';
        echo form_label('Email');
        $data = ['class'=> 'form-control', 'name'=> 'email', 'value'=> set_value('email')];
        echo form_input($data);
    echo '</div';
    
    echo '<div class="form-group">';
        echo form_label('Username');
        $data = ['class'=> 'form-control', 'name'=> 'username', 'value'=>set_value('username')];
        echo form_input($data);
    echo '</div';
    
    echo '<div class="form-group">';
        echo form_label('Password');
        $data = ['class'=> 'form-control', 'name'=>'password'];
        echo form_password($data);
    echo '</div>';
    
    echo '<div class="form-group">';
        echo form_label('Confirm Password');
        $data = ['class'=> 'form-control', 'name'=>'confirm_password'];
        echo form_password($data);
    echo '</div>';
    
    echo '<div class="form-group">';
        $data = ['class'=> 'btn btn-primary', 'name'=>'register', 'value'=>'Register'];
        echo form_submit($data);
    echo '</div>';
    
    echo form_close();