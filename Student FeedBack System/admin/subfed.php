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
	
		$sql = "SELECT Sub_Name FROM subject";
		$result = $conn->query($sql);
		
		//Inserting values in dropdown
		echo "<select name='SUB'>";
		echo "<option value='subject'>Subject</option>";

		if ($result->num_rows > 0)
			while ($row = $result->fetch_assoc())
				echo "<option value='" . $row['Sub_Name'] . "'>" . $row['Sub_Name'] . "</option>";
		else
			echo "0 results";
		echo "</select>";
		
		//Saving Resource
		$conn->close();
	}
?>
<!DOCTYPE html>
	<head>
		<title>Feedback - Admin</title>
		<link rel="stylesheet" type="text/css" href="subfed.css">
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
			<form action="subfed.php" method=POST>
				<div class=input>
					<?php abc(); ?>
					<button type=submit>Show</button>
				</div>
				<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$q1="SELECT q1, count(*) as number FROM feedback where sub_Name='".$_POST['SUB']."' GROUP BY q1";
						$result = $conn->query($q1);


						//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							?>
							      <head>  
           <script type="text/javascript" src="loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["q1"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '1.Knowledge base of the faculty about Course taught ',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('q1'));  
                chart.draw(data, options);  
           }  
           </script> 
     <?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$q2="SELECT q2, count(*) as number FROM feedback where sub_Name='".$_POST['SUB']."' GROUP BY q2";
						$result = $conn->query($q2);


						//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							?>
	   <head>  
           <script type="text/javascript" src="loader.js"></script>   
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["q2"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '2.Communication Skills of the faculty(in terms of course delivery and making you understand the course)',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('q2'));  
                chart.draw(data, options);  
           }  
           </script> 
		   <?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$q3="SELECT q3, count(*) as number FROM feedback where sub_Name='".$_POST['SUB']."' GROUP BY q3";
						$result = $conn->query($q3);


						//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							?>
	   <head>  
           <script type="text/javascript" src="loader.js"></script> 
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["q3"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '3.Sincerity/Commitment/punctuality of the faculty',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('q3'));  
                chart.draw(data, options);  
           }  
           </script> 
		  <?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$q4="SELECT q4, count(*) as number FROM feedback where sub_Name='".$_POST['SUB']."' GROUP BY q4";
						$result = $conn->query($q4);


						//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							?>
	   <head>  
           <script type="text/javascript" src="loader.js"></script> 
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["q4"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '4.Lesson planning and Execution',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('q4'));  
                chart.draw(data, options);  
           }  
           </script> 
		   <?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$q5="SELECT q5, count(*) as number FROM feedback where sub_Name='".$_POST['SUB']."' GROUP BY q5";
						$result = $conn->query($q5);


						//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							?>
	   <head>  
           <script type="text/javascript" src="loader.js"></script> 
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["q5"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '5.Ability to integrative content with Other courses / Other issues, to provide a broader perspective',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('q5'));  
                chart.draw(data, options);  
           }  
           </script> 
		    <?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$q6="SELECT q6, count(*) as number FROM feedback where sub_Name='".$_POST['SUB']."' GROUP BY q6";
						$result = $conn->query($q6);


						//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							?>
	   <head>  
           <script type="text/javascript" src="loader.js"></script> 
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["q6"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '6.Accessibility of the teacher in out of the class(includes availability of the faculty for discussion outside hours)',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('q6'));  
                chart.draw(data, options);  
           }  
           </script> 
		     <?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$q7="SELECT q7, count(*) as number FROM feedback where sub_Name='".$_POST['SUB']."' GROUP BY q7";
						$result = $conn->query($q7);


						//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							?>
	   <head>  
           <script type="text/javascript" src="loader.js"></script> 
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["q7"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '7.Answering questions/clarifying doubts',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('q7'));  
                chart.draw(data, options);  
           }  
           </script>
		    <?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$q8="SELECT q8, count(*) as number FROM feedback where sub_Name='".$_POST['SUB']."' GROUP BY q8";
						$result = $conn->query($q8);


						//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							?>
	   <head>  
           <script type="text/javascript" src="loader.js"></script> 
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["q8"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '8.Amicability with students',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('q8'));  
                chart.draw(data, options);  
           }  
           </script>
		    <?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$q9="SELECT q9, count(*) as number FROM feedback where sub_Name='".$_POST['SUB']."' GROUP BY q9";
						$result = $conn->query($q9);


						//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							?>
	   <head>  
           <script type="text/javascript" src="loader.js"></script> 
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["q9"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '9.Motivating /Counseling students for their betterment',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('q9'));  
                chart.draw(data, options);  
           }  
           </script>
		    <?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();
						$q10="SELECT q10, count(*) as number FROM feedback where sub_Name='".$_POST['SUB']."' GROUP BY q10";
						$result = $conn->query($q10);


						//if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							?>
	   <head>  
           <script type="text/javascript" src="loader.js"></script> 
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["q10"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: '10.Providing course materials and other technical details',  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('q10'));  
                chart.draw(data, options);  
           }  
           </script>
		    
	  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
          
                <br />  
                <div id="q1" style=""></div>  
				 <div id="q2" ></div>  
				 <div id="q3" ></div> 
				 <div id="q4"></div> <?php //style="width: 900px; height: 500px;" ?>
				 <div id="q5"></div>
				 <div id="q6"></div>
				 <div id="q7"></div>
				 <div id="q8"></div>
				 <div id="q9"></div>
				 <div id="q10"></div>
           </div>  
      </body> <?php
							//}
						
                                                

						$conn->close();
					?>
				</div>
                            <div>
                               
                            </div>
			</form>
		</article>
	</body>
</html>