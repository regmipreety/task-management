
<?php
require_once'function.php';
$fetchdata=new DB_con();
 if (isset($_SESSION['login'])){ include 'header.php';?>

<div class="col-md-12">

<div class="table-responsive">                
<table id="mytable" class="table table-bordred table-striped">
<thead>
<th>#</th>
<th>Trial Code</th>
<th>Created On</th>
<th>Update Status</th>
</thead>
<tbody>
<?php
 
 
 //Deletion
  $username=$_SESSION['username'];

  $sql=$fetchdata->getAssignedTask($username);
  
  $cnt=1;
  while($row=mysqli_fetch_array($sql))
  {
  ?>
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($row['task']);?></td>
    <td><?php echo htmlentities($row['created']);?></td>
    <td><a href="updateTask.php?id=<?php echo htmlentities($row['id']);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>  
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
</body>
</html>