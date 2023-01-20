
<?php
include "header.php";
// include function file
include_once("function.php");
//Object
$updatedata=new DB_con();
if(isset($_POST['update']))
{
// Get the userid
$userid=intval($_GET['id']);
// Posted Values
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
if(isset($_POST['status'])) {
  $address= '1';
} else { $address= '0';
}

if(isset($_POST['admin_status'])) {
  $admin= '1';
} else { $admin= '0';
}
//Function Calling
$sql=$updatedata->update($fname,$lname,$emailid,$contactno,$address,$userid, $admin);
// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='index.php'</script>";
}

// Get the userid
$userid=intval($_GET['id']);
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecord($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
  ?>
<form name="insertrecord" method="post">
<div class="row">
<div class="col-md-4"><b>First Name</b>
<input type="text" name="firstname" value="<?php echo htmlentities($row['FirstName']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Last Name</b>
<input type="text" name="lastname" value="<?php echo htmlentities($row['LastName']);?>" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-md-4"><b>Email id</b>
<input type="email" name="emailid" value="<?php echo htmlentities($row['EmailId']);?>" class="form-control" required>
</div>
<div class="col-md-4"><b>Contactno</b>
<input type="text" name="contactno" value="<?php echo htmlentities($row['ContactNumber']);?>" class="form-control" maxlength="10" required>
</div>
</div>
<div class="row">
<div class="col-md-8"><b>Active Status</b>
<input type="checkbox" name= "status" <?php echo ($row['status'] == '1'? 'checked':'')?>>
</div>
<div class="col-md-8"><b> Is Admin</b>
<input type="checkbox" name= "admin_status" <?php echo ($row['is_admin'] == '1'? 'checked':'')?>>
</div>
</div>
<?php } ?>
<div class="row" style="margin-top:1%">
<div class="col-md-8">
<input type="submit" name="update" value="Update">
</div>
</div>
     </form>
            
      
	</div>
</div>

</body>
</htm