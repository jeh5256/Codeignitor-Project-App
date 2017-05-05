<p class="bg-success">
    <?php
        if ($this->session->flashdata('login_success')) {
            echo $this->session->flashdata('login_success');
        }

        if ($this->session->flashdata('user_registered')) {
            echo $this->session->flashdata('user_registered');
        }
    ?>
</p>

<p class="bg-danger">
    <?php
        if ($this->session->flashdata('login_failed')) {
            echo $this->session->flashdata('login_failed');
        }

        if ($this->session->flashdata('no_access')) {
            echo $this->session->flashdata('no_access');
        }
    ?>
</p>

<div class="jumbotron">
    <h2 class="text-center">Welcome to the CI Project App</h2>
</div>
<?php if($this->session->userdata('logged_in')): ?>
    <?php if(isset($projects)): ?>
    <h1>Projects</h1>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Project Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($projects as $project){
                    echo '<tr><td>' . $project->project_name . '</td><td>' . $project->project_body . '</td><td><a href="' . base_url() . 'index.php/project/display/' . $project->id . '">View</a></td></tr>';
                }
            ?>
        </tbody>
    </table>
    <?php else:?>
    <p>No Projects Found</p>
    <?php endif; ?>
    
    <?php if(isset($tasks)): ?>
    <h1>Tasks</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Task Name</th>
                <th>Task Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($tasks as $task){
                    echo '<tr><td>' . $task->project_name .'</td><td>' . $task->task_name . '</td><td>' . $task->task_body . '</td><td><a href="' . base_url() . 'index.php/tasks/display/' . $task->id . '">View</a></td></tr>';
                }
            ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No Tasks Found</p>
    <?php endif; ?>
 <?php endif; ?>   