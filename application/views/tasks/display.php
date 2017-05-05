<h1>Task for: <?php echo $project_name ;?></h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Task Name</th>
            <th>Task Description</th>
            <th>Date Created</th>
            <th>Edit Task</th>
            <th>Delete Task</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $task->task_name; ?></td>
            <td><?php echo $task->task_body; ?></td>
            <td><?php echo $task->date_created; ?></td>
            <td><?php echo '<a href="' . base_url() .'index.php/tasks/edit/' . $task->id . '"><span class="glyphicon glyphicon-edit"></span></a>' ?></td>
            <td><?php echo '<a href="' . base_url() .'index.php/tasks/delete/' . $task->project_id . '/' . $task->id . '"><span class="glyphicon glyphicon-trash"></span></a>' ?></td>
            
            <?php
                if ($task->status) {
                    
                    echo '<td><a href="' . base_url() . 'index.php/tasks/mark_incomplete/' . $task->id . '">Mark Incomplete</span></a></td>';
                } else {
                    
                    echo '<td><a href="' . base_url() . 'index.php/tasks/mark_complete/' . $task->id . '">Mark Complete</span></a></td>';
                }
            ?>
        </tr>
    </tbody>
</table>