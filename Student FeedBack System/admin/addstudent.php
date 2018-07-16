<?php
	error_reporting(0);
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();
	
	//Values from the Form
	$sno=$_POST['sno'];
	$eno=$_POST['eno'];
	
	//Connection to DB
	$conn = $obDBRel->DBConn();

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
		//Inserting values into Student Table
		if($sno!='' || $eno!=''){
			
			for($i=$sno;$i<=$eno;$i++)
            {
                $b=$i;
			$sql=$conn->query("INSERT INTO regno (regno) VALUES (".$b.")");
		}
			if ($sql === TRUE)
				echo "<script> alert('Student Added!'); </script>";
			else
				echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		//Saving resources
		$conn->close();
	}
?>
<!DOCTYPE html>
	<head>
		<title>Add Student - Admin</title>
		<link rel="stylesheet" type="text/css" href="addstudent.css">
    <style>
        button{
            color: white;
            background: #2b669a;
            height: 30px;
            width: 70px;
        }
        a{
            color: white;
            text-decoration: none;
        }
    </style>
	</head>
	<body>
    <a href='admin.php'><img src="../images/back.png" align="left" height="50px"></a>
    <center><img src ="../images/logo.png"/></center>
    <h1 align="center">Admin Panel</h1>
    <p align="right"><button style="align-items: right;"><a  href="../logout.php">Logout</a></button></p>
		<article>
			<h1>Add a Sutudent:</h1>
			<form action=addstudent.php method=post>
				<div class=input>
					<input type=text name=sno placeholder="Student Starting" required>
					<input type=text name=eno placeholder="Student Ending" required>
					<button type=submit>ADD</button>
				</div>
				<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$sql="Select * from regno order by id asc";
						$result = $conn->query($sql);

						echo "<table class=slist>";
						echo "<tr>";
                        echo "<th>No of Student</th>";
						echo "<th>Student Reg_No</td>";

						echo "</tr>";

						if($result->num_rows > 0)
							while($row = $result->fetch_assoc()){
								echo "<tr>";
                                echo 	"<td>" . $row["id"] . "</td>";
								echo 	"<td>" . $row["regno"] . "</td>";
								echo "</tr>";
						}

						echo "</table>";

						$conn->close();
					?>
				</div>
			</form>
		</article>
	</body>
</html>
