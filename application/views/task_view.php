<?php include 'header.php'; ?>
    <nav class="navbar navbar-default" >
      <div class="container-fluid">
        <div class="navbar-header" >
          <a class="navbar-brand" href="#">Employee Task Management</a>
        </div>
        <ul class="nav navbar-nav" style="float: right;">
          <li class="active"><a href="#"><?php echo "Welcome ".$_SESSION['username']; ?></a></li>
          <li class="active"><a href="logout">LogOut</a></li>
        </ul>
      </div>
    </nav>

<div class="container">
<?php
    $task_hrs = 0;
    if (!empty($result)) {
        foreach ($result as $key => $task) {
            if ( date("Y-m-d",strtotime($task['created_on'])) == date('Y-m-d',time() )) {
                        $task_hrs+=$task['hrs']; }
        }
    }
    
    $remaning_hrs = 12-$task_hrs;
     if ($remaning_hrs > 0) {
            echo "<button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Add Task</button>";
        }else{
            echo "<button type='button' class='btn btn-warning btn-lg' data-toggle='modal' disable>Task Added </button>";
        }
?>

    </div>
    <table id="example" class="display" style="width:100%">
        <thead >
            <tr>
                <th>Sr.No</th>
                <th>Project Name</th>
                <th>Task</th>
                <th>Hours</th>
                <th>Created Date</th>
            </tr>
        </thead>
        <tbody>
            <?php  
            // echo "<pre>"; print_r($result);
            // echo "<pre>"; print_r($project);
        $i=1; 
        if (!empty($result)) {
            foreach ($result as $key => $value) { ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?php if(empty($value['project_name'])) { echo "-"; }else{ echo $value['project_name']; } ?></td>
                <td><?php if(empty($value['task'])) { echo "-"; }else{ echo $value['task']; } ?></td>
                <td><?php if(empty($value['hrs'])) { echo "-"; }else{ echo $value['hrs']; } ?></td>
                <td><?php echo date("Y-m-d",strtotime($value['created_on'])) ?></td>
            </tr>
            <?php } } ?>
            
        </tbody>
    </table>
    
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Task</h4>
      </div>
       <div class="modal-body">
        <form method="post" action="task_add">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Project : </label>
            <select class="form-control" name="project_id">

                <?php 
                foreach ($project as $key => $project_val) {
                    echo "<option value=".$project_val['pid'].">".$project_val['project_name']."</option>";
                }

                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Task : </label>
            <input type="text" name="task" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Hours : </label>
            <input type="number" class="form-control" name="hrs" value="<?php if($remaning_hrs >= 0){ echo 1; }else{ echo 0; } ?>"  max="<?= $remaning_hrs; ?>" min="1" onKeyPress="if(this.value.length>=1) return false;" />

          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Created Date : </label>
            <input type="hidden" class="form-control" name="date" value="<?php echo date('Y-m-d',time()) ?>">
            <input type="text" class="form-control"  value="<?php echo date('Y-m-d',time()) ?>" disabled>
          </div>
          <div >
            <input type="submit" value="Add Task" class="btn btn-success">
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable({
    	"autoWidth": false,
            "lengthChange": false,
            "pageLength": 25,
            'columnDefs': [ {
    'targets': [], /* column index */
    'orderable': false, /* true or false */
 }],
 "aaSorting": []
    });
} );
</script>

<?php include 'footer.php'; ?>