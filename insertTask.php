<?php
// include database connection file
require_once'function.php';
// Object creation
$insertdata=new DB_con();
$codename=intval($_GET['id']);
$users=$insertdata->fetchAllUsers();
if(isset($_POST['insertTask']))
{
    // Posted Values
    $task=$_POST['task'];
    $status=$_POST['status'];
    $description=$_POST['description'];
    $dueDate= $_POST['dueDate'];
    $userID=$_POST['UserID'];
    //Function Calling
    $sql=$insertdata->insertTask($task,$status,$description,$codename, $dueDate, $userID);

    if($sql)
    {
        // Message for successfull insertion
        echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
    else
    {
        // Message for unsuccessfull insertion
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}
include 'header.php';
?>

<form name="insertrecord" method="post">
<div class="row">
    
    <div class="col-md-8"><b>ARM NO</b>
        <input type="text" name="task" class="form-control" required>
    </div>
    <div class="col-md-8"><b>Description</b>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="col-md-8">Status:
        <select name="status" class="form-control">
            <option  value="" disabled selected>Select status</option>
            <option value="initiating">initiating</option>
            <option  value="in progress">in progress</option>
            <option value="complete">complete</option>
            
        </select>
  
    </div>  
    <div class="col-md-8"><b>Assign To</b>
      <select name="UserID" class="form-control">    
            <?php
                    while($row1 = mysqli_fetch_array($users)) {
            ?>
            <option value="<?php echo $row1['ID'];?>"><?php echo $row1['username'];?></option>
            <?php 
                    }
                
            ?>
        </select>
    </div>
    <div class="col-md-8"><b>Due Date</b>
        <input type="date" name="dueDate" class="form-control" required>
    </div>
 
</div>

    <div class="col-md-8" style="margin:1%">
        <input type="submit" name="insertTask" value="Submit" class="btn btn-danger">
    </div>
</div> 
             

</form>           
</div>
</div>
</body>
</html>