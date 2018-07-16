<?php
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	error_reporting(0);
	$obDBRel->redirect();
	
	//Connecting to DB
	$conn = $obDBRel->DBconn();
        $dep=$_POST['staff'];
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		//Obtaining values from Form
		$sub=$_POST['subject'];

		//Inserting values to Subject Table
		if($sub=="")
			echo "<script> alert('Enter a subject.'); </script>";
		else{
			$sql="INSERT INTO subject VALUES (NULL,'$sub','$dep')";
			if ($conn->query($sql) === TRUE)
				echo "<script> alert('Subject Added!'); </script>";
			else
				echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	//Saving Resource
	$conn->close();
?>
<!DOCTYPE html>
	<head>
		<title>Add Subject - Admin</title>
		<link rel="stylesheet" type="text/css" href="addsub.css">
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
        select {


            background: transparent;
            font-size: 20px;
            font-weight: bold;
            padding: 2px 10px;
            width: 378px;
            *width: 350px;
        }

    </style>
	</head>
	<body>
    <a href='admin.php'><img src="../images/back.png" align="left" height="50px"></a>
    <center><img src ="../images/logo.png"/></center>
    <h1 align="center">Admin Panel</h1>

    <p align="right"><button style="align-items: right;"><a  href="../logout.php">Logout</a></button></p>


    <article>
			<h1>Add a Subject:</h1>
			<form action=addsub.php method=post>
				<div class=input>
                    <input type=text name=staff placeholder="Staff Name" required>&nbsp;&nbsp;&nbsp;&nbsp;
					<input type=text name=subject placeholder="Subject Name" required>
					<button type=submit>ADD</button>
				</div>
				<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$sql="Select * from subject order by Sub_No asc";
						$result = $conn->query($sql);

						echo "<table class=slist>";
						echo "<tr>";
						echo 	"<th>Subject ID</td>";
						echo 	"<th>Subject Name</td>";
						echo 	"<th>Staff Name</td>";
						echo "</tr>";

						if($result->num_rows > 0)
							while($row = $result->fetch_assoc()){
								echo "<tr>";
								echo 	"<td>" . $row["Sub_No"] . "</td>";
								echo 	"<td>" . $row["Sub_Name"] . "</td>";
                                                                echo 	"<td>" . $row["staff"] . "</td>";
								echo "</tr>";
						}

						echo "</table>";

						$conn->close();
					?>
				</div>
			</form>

	</body>
</html>