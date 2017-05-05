<h1>Projects</h1>

<p class="bg-success">
    <?php
       if ($this->session->flashdata('project_updated')) {
           echo $this->session->flashdata('project_updated');
       }
    
       if ($this->session->flashdata('project_created')) {
           echo $this->session->flashdata('project_created');
       }
       
       if ($this->session->flashdata('project_deleted')) {
           echo $this->session->flashdata('project_deleted');
       }
       
       if ($this->session->flashdata('task_created')) {
           echo $this->session->flashdata('task_created');
       }
       
       if ($this->session->flashdata('task_updated')) {
           echo $this->session->flashdata('task_updated');
       }
    ?>
</p>
<a href="<?php echo base_url();?>index.php/project/create" class="btn btn-primary pull-right">Create Project</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Project Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($projects as $project){
                echo "<tr><td><a href='" . base_url()."index.php/project/display/" . $project->id . "'>" . $project->project_name . "</a></td>" ."<td>" . $project->project_body . "</td><td><a href='" . base_url() . "index.php/project/delete/" .  $project->id . "'><span class='glyphicon glyphicon-trash btn btn-danger'></span></a></td></tr>";
            }
        ?>
    </tbody>
</table>