<h2>Login</h2>

 
<?php

    if ($this->session->userdata('logged_in')) {
       
       echo form_open('users/logout');
       
        if ($this->session->userdata('username')) {
            echo '<p><span class="glyphicon glyphicon-user"></span>' . $this->session->userdata('username') . '</p>';
        }
        
       $data = [
                'class'=> 'btn btn-primary',
                'name' => 'submit',
                'value'=> 'Log Out'
            ];
       echo form_submit($data);
       echo form_close();
       
    } else {
        $attributes = ['id'=> 'login_form', 'class'=> 'form_horizontal'];
        
        if ($this->session->flashdata('errors')) {
            echo $this->session->flashdata('errors');
        }

        echo form_open('users/login', $attributes);
        
        echo '<div class="form-group">';
            echo form_label('Username');
            $data = ['class'=> 'form-control', 'name'=>'username'];
            echo form_input($data);

        echo '</div>';
        
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
            $data = ['class'=> 'btn btn-primary', 'name'=>'submit', 'value'=>'submit'];
            echo form_submit($data);
        echo '</div>';
        
        echo form_close();
    }