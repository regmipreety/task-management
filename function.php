<?php

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'oop_test');
session_start();
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}
//Data Insertion Function
	public function insert($fname,$lname,$emailid,$contactno,$address)
	{
	$ret=mysqli_query($this->dbh,"insert into tblusers(FirstName,LastName,EmailId,ContactNumber,Address) values('$fname','$lname','$emailid','$contactno','$address')");
	return $ret;
	}
//Data read Function
public function fetchdata()
	{
	$result=mysqli_query($this->dbh,"select * from tblusers");
	return $result;
	}
//Data one record read Function
public function fetchonerecord($userid)
	{
	$oneresult=mysqli_query($this->dbh,"select * from tblusers where id=$userid");
	return $oneresult;
	}
//Data updation Function
public function update($fname,$lname,$emailid,$contactno,$address,$userid, $admin)
	{
	$updaterecord=mysqli_query($this->dbh,"update  tblusers set FirstName='$fname',LastName='$lname',EmailId='$emailid',ContactNumber='$contactno',status='$address', is_admin ='$admin' where id='$userid' ");
	return $updaterecord;
	}
//Data Deletion function Function
public function delete($rid)
	{
	$deleterecord=mysqli_query($this->dbh,"delete from tblusers where id=$rid");
	return $deleterecord;
	}

	public function login($email, $pass) {  
         
        $check = mysqli_query($this->dbh,"Select * from tblusers where EmailId='$email' and password='$pass' and status= 1");  
        $data = mysqli_fetch_array($check);  
        $result = mysqli_num_rows($check);  
        if ($result > 0) {  
			
            $_SESSION['login'] = true;  
			$_SESSION['username'] = $email;
			$_SESSION['admin']= $data['is_admin'];
			return true;						
        } else {  
            return false;  
        }  
    }  

	public function fullname($id) {  
        $result = mysql_query("Select * from users where id='$id'");  
        $row = mysql_fetch_array($result);  
        echo $row['name'];  
    }  
  
    public function session() {  
        if (isset($_SESSION['login'])) {  
            return $_SESSION['login'];  
        }  
    }  
  
    public function logout() {  
        $_SESSION['login'] = false;  
        session_destroy();  
    }  

	public function fetchtasks()
	{
	$result=mysqli_query($this->dbh,"select * from task");
	return $result;
	}
	//fetch all tasks

	public function insertTask($task,$status,$description,$codename,$dueDate, $userID)
	{
			$ret=mysqli_query($this->dbh,"insert into task(task,status, description, trial_id, UserID, dueDate) values('$task','$status', '$description', '$codename', '$userID', '$dueDate')");		
			return $ret;		

	}
	//insert a task

	public function getAssigned(){
		$sql = 'SELECT a.id, a.status, a.created, a.task, b.username
				FROM task a, users b
				WHERE a.userID = b.ID';
		 
         $result = mysqli_query($this->dbh, $sql);
		 return $result;      

	}

	//get task by id

	public function getTaskbyid($userid){
		$sql = "SELECT a.* , b.username
				FROM task a, users b
				WHERE a.userID = b.ID and a.id= '$userid'";
         $result = mysqli_query($this->dbh, $sql);
		 return $result;      
	}
	//update a task

	public function updateTask($task,$status,$userid,$assignedid,$description,$duedate)
	{
	$updaterecord=mysqli_query($this->dbh,"update  task set task='$task',status='$status',UserID='$assignedid', description= '$description', dueDate= '$duedate' where id='$userid' ");
	return $updaterecord;
	}

	//fetch one task by ID

	//Data one record read Function
	public function fetchonetask($userid)
	{	$sql = "SELECT a.id, a.status, a.created, a.task, a.description, a.dueDate, b.username
				FROM task a, users b
				WHERE a.userID = b.ID and a.trial_id = '$userid'";

		$oneresult=mysqli_query($this->dbh,$sql);
		return $oneresult;
	}

	public function fetchAllUsers()
	{
	$result=mysqli_query($this->dbh,"select * from users");
	return $result;
	}
	//fetch all tasks

	//delete task

	public function deleteTask($rid)
	{
	$deleterecord=mysqli_query($this->dbh,"delete from trial_code where id = $rid");
	return $deleterecord;
	}

	//get Trial Codes
	public function fetchAllCodes()
	{
		$result=mysqli_query($this->dbh,"select * from trial_code");
		return $result;
	}

	//insert Trial Code

	public function insertTrial($codename){
		$trials=mysqli_query($this->dbh, "insert into trial_code(codename) values ('$codename')");
		return $trials;
	}
	// get assigned by username
	public function getAssignedTask($username){
		$sql = "SELECT a.id, a.UserID, a.status, a.created, a.task, b.username
				FROM task a, users b
				WHERE a.UserID = b.ID and b.username='$username' ";
         $result = mysqli_query($this->dbh, $sql);
		 return $result;      

	}

	public function deleteTaskbyID($rid)
	{
		
	$deleterecord=mysqli_query($this->dbh,"delete from task where id = $rid");
	return $deleterecord;
	}

}
?>