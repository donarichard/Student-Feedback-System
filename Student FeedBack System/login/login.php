<?php
	error_reporting(0);
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirectlogin();

	//Connecting to DB
	$conn = $obDBRel->DBConn();

	//Obtaining Values from Tables
	$sql = "SELECT * FROM student";
	$result = $conn->query($sql);
	$user=$_POST['user'];
    $pass=$_POST['pass'];

	$flag=0;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['user'] = $_POST['user'];
        $_SESSION['pass'] = $_POST['pass'];

        //Checking the entered username (admin)
        if ($_SESSION['user'] == 'admin' && $_SESSION['pass'] == 'admin')
            header('location: ../admin/admin.php');
        else
            $sql = "SELECT id FROM regno WHERE regno = '$user' and regno = '$pass'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

         header("location: ../student/student.php");
      }else {
          echo "<script type='text/javascript'>alert('UserName & password Incorrect ')</script>";
      }


    }

	
	$conn->close();
?>
<html>
	<head>
		<title>Login Page</title>
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
		<img src ="../images/logo.png"/>
      <center> <h1 style="font-family: 'High Tower Text'">Student FeedBack</h1></center>
        <hr>

    <center> <h3 style="font-family: Forte"><B>Student Login</B></h3></center>
		<div>
			<form action="login.php" method="post">

				<table align=center border="0" width="30%">
					<tr>
						<td><h3>Username</h3></td>
						<td><input type=text name=user required></td>
					</tr>
					<tr>
						<td><h3>Password</h3></td>
						<td><input type=password name=pass required></td>
					</tr>
				</table>
                <button type=submit>Login</button>
			</form>
		</div>
    <br>
    <h4><B>Note:</B>Username/regno not be included in feedback </h4>
	</body>
</html>