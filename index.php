<?php
// include function file
require_once'function.php';
$user = new DB_con();  

//Deletion
if(isset($_GET['del']))
    {
// Geeting deletion row id
$rid=$_GET['del'];

$sql=$user->delete($rid);
if($sql)
{
// Message for successfull insertion
echo "<script>alert('Record deleted successfully');</script>";
echo "<script>window.location.href='index.php'</script>";
}
    }

    if(isset($_POST['send']))
    {
        // Posted Values
        
        $codename=$_POST['codename'];
        
        //Function Calling
        $sql=$user->insertTrial($codename);
        
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


?>
<?php
include 'header.php';
 if (isset($_SESSION['login'])){
     if ($_SESSION['admin']== '1'){ 
       ?>

        <div>
                
                <a href="insert.php"><button class="btn btn-primary"> Insert Record</button></a>
                <a href="displayUsers.php"><button class="btn btn-primary"> Display Users</button></a>
                
                <button id="contact-icon" style="margin:1%" class="btn btn-primary">Create Trial</button>

                    <div class="table-responsive">                
                        
                                    <?php
                                    include 'displayTrialCode.php';
                                    } else {header("location: assignedTrialCode.php"); }
                                }
                                 else {header("location:login.php"); 
                                                 }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- table responsive -->
        </div>
    </div>
</div>
<div id="contact-popup">
        <form class="contact-form" action="" id="contact-form"
            method="post" enctype="multipart/form-data">
            <h1>Add new Trial Code</h1>
                
            <div class="col-md-4"><b>Trial Code</b>
                    <input type="text" id="codename" name="codename"
                        class="inputBox form-control" required />
            </div>           
            
            <div class="row" style="margin:10%">
                <div class="col-md-8">
                    <input type="submit" id="send" name="send" value="Send" class="btn btn-danger"/>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
