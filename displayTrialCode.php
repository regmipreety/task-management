<?php
 if (isset($_SESSION['login'])){ ?>
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="table-responsive">                
<table id="mytable" class="table table-bordred table-striped">
<thead>
<th>#</th>
<th>Trial Code</th>
<th>Created On</th>
<th>Add Tasks</th>
<th>Display Tasks</th>
<th>Delete</th>
</thead>
<tbody>
<?php
 
 $fetchdata=new DB_con();
 //Deletion
if(isset($_GET['delete']))
{
   // Geeting deletion row id
   $rid=$_GET['delete'];
   
   $del=$fetchdata->deleteTask($rid);
   if($del)
   {
   // Message for successfull insertion
   echo "<script>alert('Record deleted successfully');</script>";
   echo "<script>window.location.href='index.php'</script>";
   }
}
  $sql=$fetchdata->fetchAllCodes();
  $cnt=1;
  while($row=mysqli_fetch_array($sql))
  {
  ?>
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($row['codename']);?></td>
    <td><?php echo htmlentities($row['created_on']);?></td>
    <td><a href="insertTask.php?id=<?php echo htmlentities($row['ID']);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>  
 <td><a href="displayTasks.php?id=<?php echo htmlentities($row['ID']);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
 <td><a href="displayTasks.php?delete=<?php echo htmlentities($row['ID']);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
    </tr>
<?php
// for serial number increment
$cnt++;
}
} else {header("location:login.php");   }?>
</tbody>
</table>
</div>
</div>
</div>
</div>