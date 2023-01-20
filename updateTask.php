
<?php
// include function file
include_once("function.php");
//Object
$updatedata=new DB_con();
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values
$task=$_POST['task'];
$status=$_POST['status'];
$assignedid=$_POST['UserID'];
$description=$_POST['description'];
$date= $_POST['dueDate'];
//Function Calling
$sql=$updatedata->updateTask($task,$status,$userid,$assignedid,$description,$date);
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>";
}
include 'header.php';
// Get the userid
$userid=intval($_GET['id']);

$onerecord=new DB_con();
$sql=$onerecord->getTaskbyid($userid);
$cnt=1;
$users= $onerecord->fetchAllUsers();
while($row=mysqli_fetch_array($sql))
  {
    
    $statusvalue= $row['status'];
    $username= $row['username'];
   
  ?>
<form name="insertrecord" method="post">
  <div class="row">
  
    <div class="col-md-4"><b>ARM NO</b>
      <input type="text" name="task" value="<?php echo htmlentities($row['task']);?>" class="form-control" required>
    </div>
    <div class="col-md-4"><b>Description</b>
      <textarea name="description"  class="form-control" required> <?php echo htmlentities($row['description']);?></textarea>
    </div>
    <div class="col-md-4"><b>Status </b>
        <select name="status" class="form-control" >
          
            <option value="initiating" <?php echo ($statusvalue == 'initiating'? 'selected':'')?> >initiating</option>
            <option  value="in progress" <?php echo ($statusvalue == 'in progress'? 'selected':'')?> >in progress</option>
            <option value="complete"  <?php echo ($statusvalue == 'complete'? 'selected':'')?> >complete</option>
            
        </select>
      
    </div>
  </div>
  <div class="row">
    <div class="col-md-4"><b>Assigned To</b>
      <select name="UserID" class="form-control">    
            <?php
                    while($row1 = mysqli_fetch_array($users)) {
            ?>
            <option value="<?php echo $row1['ID'];?>" <?php echo ($username == $row1['username']? 'selected':'')?> > <?php echo $row1['username'];?> </option>
            <?php 
                    }
                
            ?>
        </select>
    </div>
    <div class="col-md-4"><b>Due Date</b>
      <input type="date" name="dueDate" value="<?php echo htmlentities($row['dueDate']);?>" class="form-control" required>
    </div>
  </div>
  <?php } ?>
  <div class="row" style="margin-top:1%">
    <div class="col-md-8">
      <input type="submit" name="update" value="Update" class="btn btn-primary">
    </div>
  </div>
</form>
</div>            
</body>
</html>