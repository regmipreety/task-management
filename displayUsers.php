<?php 
    include "header.php";
?>
<table id="mytable" class="table table-bordred table-striped">
    <thead>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Posting Date</th>
        <th>Active</th>
        <th>Admin</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php
            
            require_once'function.php';
            $fetchdata=new DB_con();

                        //Deletion
            if(isset($_GET['del']))
            {
                // Geeting deletion row id
                $rid=$_GET['del'];

                $sql=$fetchdata->delete($rid);
                if($sql)
                {
                // Message for successfull insertion
                echo "<script>alert('Record deleted successfully');</script>";
                echo "<script>window.location.href='index.php'</script>";
                }
            }
            $sql=$fetchdata->fetchdata();
            $cnt=1;
            
            while($row=mysqli_fetch_array($sql))
            {
            ?>
                <tr>
                <td><?php echo htmlentities($cnt);?></td>
                <td><?php echo htmlentities($row['FirstName']);?></td>
                <td><?php echo htmlentities($row['LastName']);?></td>
                <td><?php echo htmlentities($row['EmailId']);?></td>
                <td><?php echo htmlentities($row['ContactNumber']);?></td>
                <td><?php echo htmlentities($row['PostingDate']);?></td>
                <td> <input type="checkbox" name= "status" <?php echo ($row['status'] == '1'? 'checked':'')?> disabled></td>
                <td> <input type="checkbox" name= "admin" <?php echo ($row['is_admin'] == '1'? 'checked':'')?> disabled></td>
            <td><a href="update.php?id=<?php echo htmlentities($row['id']);?>"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
            <td><a href="displayUsers.php?del=<?php echo htmlentities($row['id']);?>"><button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                </tr>
            <?php
            // for serial number increment
            $cnt++;
            }
            ?>
            </tbody>
</table>