<?php include 'header.php';?>
<div class="col-md-12">

<div class="table-responsive">                
<table id="taskstable" class="table table-bordred table-striped">
<thead>
<th>#</th>
<th>Task</th>
<th>Status</th>
<th>Description</th>
<th>Created On</th>
<th>Assigned to</th>
<th>Due Date</th>
<th>Edit</th>
<th>Delete</th>
</thead>
<tbody>
<?php
 // include function file
 include_once("function.php");
 $fetchdata=new DB_con();
 $trialid=intval($_GET['id']);
 //Deletion
if(isset($_GET['delete']))
{
   // Geeting deletion row id
   $rid=$_GET['delete'];
   
   $del=$fetchdata->deleteTaskbyID($rid);
   if($del)
   {
   // Message for successfull insertion
   echo "<script>alert('Record deleted successfully');</script>";
   echo "<script>window.location.href='index.php'</script>";
   }
}
  $sql=$fetchdata->fetchonetask($trialid);
  $cnt=1;
  while($row=mysqli_fetch_array($sql))
  {
  ?>
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($row['task']);?></td>
    <td><?php echo htmlentities($row['status']);?></td>
    <td><?php echo htmlentities($row['description']);?></td>
    <td><?php echo htmlentities($row['created']);?></td>
    <td><?php echo htmlentities($row['username']);?></td>
    <td><?php echo htmlentities($row['dueDate']);?></td>
    
 <td><a href="updateTask.php?id=<?php echo htmlentities($row['id']);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
 <td><a href="displayTasks.php?delete=<?php echo htmlentities($row['id']);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
    </tr>
<?php
// for serial number increment
$cnt++;
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</body>
</html>

