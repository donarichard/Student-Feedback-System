<?php 
	class DBRel{
		
		function DBConn(){
			$conn = new mysqli("localhost", "sa", "root", "studentfeedback");
			if ($conn->connect_error)
				die("Connection failed: " . $conn->connect_error);
			
			return $conn;
		}

		function redirect(){
			$flag=0;
			$conn=$this->DBConn();
			$sql="Select regno from regno";
			$result = $conn->query($sql);

			if($_SESSION["user"] == "admin")
				$flag=1;

			if($result->num_rows >0)
				while($row = $result->fetch_assoc())
					if($_SESSION["user"] == $row["regno"]){
						$flag=1;
						break;
					}

			if($flag==0)
				header("Location: ../login/login.php");

			$conn->close();
		}

		function redirectlogin(){
			$flag=0;
			$conn=$this->DBConn();
			$sql="Select regno from regno";
			$result = $conn->query($sql);

			if($_SESSION["user"] == "admin")
				$flag=1;

			if($result->num_rows >0)
				while($row = $result->fetch_assoc())
					if($_SESSION["user"] == $row["regno"]){
						$flag=2;
						break;
					}

			else if($flag==1)
				header("Location: ../admin/admin.php");
			else if($flag==2)
				header("Location: ../student/student.php");

			$conn->close();
		}
	}


?>