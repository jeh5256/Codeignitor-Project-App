<p class="bg-success">
    <?php
        if ($this->session->flashdata('task_donee')) {
            
            echo $this->session->flashdata('task_done');
        }
        
        if ($this->session->flashdata('task_incomplete')) {
            
            echo $this->session->flashdata('task_incomplete');
        }
    ?>
</p>
<div class="col-xs-9">
    <h1>Project Name: <?php echo $project_data->project_name;?></h1>
    <p><span class="glyphicon glyphicon-calendar"></span> <?php echo $project_data->date_created;?></p>
    <h3>Project Description</h3>
    <p><?php echo $project_data->project_body;?></p>
    <h3>Active Tasks</h3>
        <?php if ($completed_tasks) {
                
            echo '<ul>';
            
            foreach ($completed_tasks as $task) {

                echo '<li><a href="' . base_url() . 'index.php/tasks/display/' . $task->task_id . '">' . $task->task_name . '</a></li>';
            }
                
            echo '</ul>';
            
            } else {
                
                echo '<p>No pending tasks!</p>';
            }
        ?>
    <h3>Inactive Tasks</h3>
        <?php if ($incompleted_tasks) {
                
                echo '<ul>';
                
                foreach ($incompleted_tasks as $task) {
    
                    echo '<li><a href="' . base_url() . 'index.php/tasks/display/' . $task->task_id . '">' . $task->task_name . '</a></li>';
                }
                
                echo '</ul>';
            } else {
                
                echo '<p>No Inactive tasks!</p>';
            }
        ?>
    
</div>
<div class="col-xs-3 pull-right">
    <ul class="list-group">
        <h4>Project Options</h4>
        <li class="list-group-item"><a href="<?php echo base_url() . "index.php/tasks/create/" . $project_data->id?>">Create Task</a></li>
        <li class="list-group-item"><a href="<?php echo base_url() . "index.php/project/edit/" . $project_data->id?>">Edit Project</a></li>
        <li class="list-group-item"><a href="<?php echo base_url() . "index.php/project/delete/" . $project_data->id?>">Delete Project</a></li>
    </ul>
</div>