<?php
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();
	error_reporting(0);
	
	//Function for Dropdown menu
	function abc(){
		$obDBRel = new DBRel;

		//Connecting PHP with DBMS and Obtaining Result of a query
		$conn = $obDBRel->DBConn();

		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
	
		$sql = "SELECT regno FROM regno";
		$result = $conn->query($sql);
		
		//Inserting values in dropdown
		echo "<select name='STD'>";
		echo "<option value='rollno'>Roll No.</option>";

		if ($result->num_rows > 0)
			while ($row = $result->fetch_assoc())
				echo "<option value='" . $row['regno'] . "'>" . $row['regno'] . "</option>";
		else
			echo "0 results";
		echo "</select>";
		
		//Saving Resource
		$conn->close();
	}
?>
<!DOCTYPE html>
	<head>
		<title>Delete Student - Admin</title>
		<link rel="stylesheet" type="text/css" href="delstudent.css">
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
			<h1>Delete a Record from Student:</h1>
			<form action="delstudent.php" method=POST>
				<div class=input>
					<?php abc(); ?>
					<button type=submit>Delete</button>
				</div>
				<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();

						$sql="SELECT * FROM regno order by id";
							$result = $conn->query($sql);

						if($result->num_rows > 0){
							echo "<table class=slist>";
							echo "<tr>";
							echo 	"<th>Roll No.</td>";
							echo 	"<th>Student Regno</td>";
							echo "</tr>";
							while($row = $result->fetch_assoc()){
								echo "<tr>";
								echo 	"<td>" . $row["id"] . "</td>";
								echo 	"<td>" . $row["regno"] . "</td>";
								echo "</tr>";
							}	
						}
						else
							echo "<div align='center' style='font-size:20px'>No Records.</div>";

						if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							
							$sql="TRUNCATE TABLE regno";
								$result = $conn->query($sql);

							if ($conn->query($sql) === TRUE){
								echo "<script> alert('Student Deleted!'); </script>";
								header('Location:delstudent.php');
							}
							else
								echo "Error: " . $sql . "<br>" . $conn->error;

						}

						echo "</table>";

						$conn->close();
					?>
				</div>
			</form>
		</article>
	</body>
</html>