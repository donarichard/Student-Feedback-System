<?php 
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();
?>
<!DOCTYPE html>
	<head>
		<title>Feedback - Admin</title>
		<link rel="stylesheet" type="text/css" href="fullfec.css">
	</head>
	<body>
		<header>
                        <a href='feedback.php'><img src="../images/back.png"></a>
			<img src ="../images/tellus-logo.png"/>
			<span>
				<a href="../logout.php">Logout</a>
			</span>
		</header>
		<article>
			<h1>Complete Feedback:</h1>
			<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$sql="Select * from feedback order by Fedno asc";
						$result = $conn->query($sql);

						echo "<table class=slist>";
						echo "<tr>";
						echo 	"<th>Feedback No.</td>";
						echo 	"<th>Roll No.</td>";
						echo 	"<th>Subject Name</td>";
						echo 	"<th>Feedback</td>";
                                                echo    "<th>Q1</td>";
                                                echo    "<th>Q2</td>";
                                                echo    "<th>Q3</td>";
                                                echo    "<th>Q4</td>";
                                                echo    "<th>Q5</td>";
                                                echo    "<th>Q6</td>";
                                                echo    "<th>Q7</td>";
                                                echo    "<th>Q8</td>";
                                                echo    "<th>Q9</td>";
                                                echo    "<th>Q10</td>";
                                                echo    "<th>Avg</td>";
						echo "</tr>";

						if($result->num_rows > 0)
							while($row = $result->fetch_assoc()){
								echo "<tr>";
								echo 	"<td>" . $row["Fedno"] . "</td>";
								echo 	"<td>" . $row["roll_no"] . "</td>";
								echo 	"<td>" . $row["sub_name"] . "</td>";
								echo 	"<td>" . $row["feedback"] . "</td>";
                                                                echo 	"<td>" . $row["q1"] . "</td>";
                                                                echo 	"<td>" . $row["q2"] . "</td>";
                                                                echo 	"<td>" . $row["q3"] . "</td>";
                                                                echo 	"<td>" . $row["q4"] . "</td>";
                                                                echo 	"<td>" . $row["q5"] . "</td>";
                                                                echo 	"<td>" . $row["q6"] . "</td>";
                                                                echo 	"<td>" . $row["q7"] . "</td>";
                                                                echo 	"<td>" . $row["q8"] . "</td>";
                                                                echo 	"<td>" . $row["q9"] . "</td>";
                                                                echo 	"<td>" . $row["q10"] . "</td>";


                                                                $tot=$row["q1"]+$row["q2"]+$row["q3"]+$row["q4"]+$row["q5"]+$row["q6"]+$row["q7"]+$row["q8"]+$row["q9"]+$row["q10"];
                                                                $avg=$tot/10;
                                                                echo    "<td>" . round($avg) . "</td>";
								echo "</tr>";
						}

						echo "</table>";

						$conn->close();
					?>
				</div>
			</article>
	</body>
</html>