<?php
	session_start();
	error_reporting(0);
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();

	//Function for Dropdown box
	function abc(){
        $obDBRel = new DBRel;

        //Connecting PHP with DBMS and Obtaining Result of a query
        $conn = $obDBRel->DBConn();

        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);

        $sql = "SELECT Sub_Name FROM subject where Sub_Name not in( select sub_name from feedback where roll_no=".$_SESSION['user']." )";
        $result = $conn->query($sql);

        //Inserting values in dropdown
        echo "<center><select name='SUB' id='brand'></center>";
		echo "<option value=''>Select Subject</option>";


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
		<title>Student Page</title> 
           <script src="jquery.js"></script>  
      </head>  
      <body>  
		<link rel="stylesheet" type="text/css" href="login.css">
		<script>  
 $(document).ready(function(){  
      $('#brand').change(function(){  
           var brand_id = $(this).val();  
           $.ajax({  
                url:"data.php",  
                method:"POST",  
                data:{brand_id:brand_id},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 </script>  
    <style>

        select{
            background-color: #e0e0e0;
            width: 200px;
            font-size:20px;
            border-style:hidden;
            border-radius: 2px;
            border-width:0px;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }
        .input{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        .output{
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width:auto;
            margin-top: 40px;
            padding: 60px;
            min-height: 250px;
            padding: 20px;
            box-shadow: 0px 0px 17px 8px rgba(0, 0, 0,0.05);
        }
        textarea{
            border:none;
            width: 600px;
        }
        button{
            margin: 10px;
            height: 38px;
            color: #ffffff;
            font-size: 20px;
            background: #c4ffad;
            padding: 5px;
            text-decoration: none;
            border: 0px;
            margin-left: 10px;
        }
        button:hover{
            background: #00f54e;
            text-decoration: none;
        }
        P{
            text-align: left;
        }
        article{
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .bu{
            color: white;
            background: #2b669a;
            height: 30px;
            width: 70px;
            float: right;
            alignment: right;
        }
        a{
            color: white;
            text-decoration: none;

        }
        .f{
            float: right;
        }

    </style>
	</head>
	<body>
    <center><img src ="../images/logo.png"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <p class="f"> <button class="bu"><a  href="../logout.php">Logout</a></button></p></center>

    <center> <h1 style="font-family: 'High Tower Text'">Student FeedBack</h1></center>

    <article>
			<form action="student.php" method="post">

                      <?php abc();?>

<p id="show_product"> </p> 
				<div class="output">
                                    <table>
                                        <tr>
                                            <th></th>
                                            <th>Very Good</th>
                                            <th>Good</th>
                                            <th>Average</th>
                                            <th>Improvement Needed</th>
                                        </tr>

					<tr>
                                            <th><P>1.Knowledge base of the faculty about Course taught</p></th>
                                            <th><input type="radio" name="q1" value="Very Good" required></th>
                                            <th><input type="radio" name="q1" value="Good"></th>
                                            <th><input type="radio" name="q1" value="Average"></th>
                                            <th><input type="radio" name="q1" value="Improvement Needed"></th>

                                        </tr>
                                        <tr>
                                            <th><P>2.Communication Skills of the faculty(in terms of course delivery and making you understand the course)</p></th>
                                            <th><input type="radio" name="q2" value="Very Good" required></th>
                                            <th><input type="radio" name="q2" value="Good"></th>
                                            <th><input type="radio" name="q2" value="Average"></th>
                                            <th><input type="radio" name="q2" value="Improvement Needed"></th>

                                        </tr>
                                        <tr>
                                            <th><P>3.Sincerity/Commitment/punctuality of the faculty</p></th>
                                            <th><input type="radio" name="q3" value="Very Good" required></th>
                                            <th><input type="radio" name="q3" value="Good"></th>
                                            <th><input type="radio" name="q3" value="Average"></th>
                                            <th><input type="radio" name="q3" value="Improvement Needed"></th>
                                        </tr>
                                        <tr>
                                            <th><P>4.Lesson planning and Execution</p></th>
                                            <th><input type="radio" name="q4" value="Very Good" required></th>
                                            <th><input type="radio" name="q4" value="Good"></th>
                                            <th><input type="radio" name="q4" value="Average"></th>
                                            <th><input type="radio" name="q4" value="Improvement Needed"></th>
                                        </tr>
                                        <tr>
                                            <th><P>5.Ability to integrative content with Other courses / Other issues, to provide a broader perspective</p></th>
                                            <th><input type="radio" name="q5" value="Very Good" required></th>
                                            <th><input type="radio" name="q5" value="Good"></th>
                                            <th><input type="radio" name="q5" value="Average"></th>
                                            <th><input type="radio" name="q5" value="Improvement Needed"></th>
                                        </tr>
                                        <tr>
                                            <th><P>6.Accessibility of the teacher in out of the class(includes availability of the faculty for discussion outside hours)</p></th>
                                            <th><input type="radio" name="q6" value="Very Good" required></th>
                                            <th><input type="radio" name="q6" value="Good"></th>
                                            <th><input type="radio" name="q6" value="Average"></th>
                                            <th><input type="radio" name="q6" value="Improvement Needed"></th>
                                        </tr>
                                        <tr>
                                            <th><P>>7.Answering questions/clarifying doubts</p></th>
                                            <th><input type="radio" name="q7" value="Very Good" required></th>
                                            <th><input type="radio" name="q7" value="Good"></th>
                                            <th><input type="radio" name="q7" value="Average"></th>
                                            <th><input type="radio" name="q7" value="Improvement Needed"></th>
                                        </tr>
                                        <tr>
                                            <th><P>8.Amicability with students</p></th>
                                            <th><input type="radio" name="q8" value="Very Good" required></th>
                                            <th><input type="radio" name="q8" value="Good"></th>
                                            <th><input type="radio" name="q8" value="Average"></th>
                                            <th><input type="radio" name="q8" value="Improvement Needed"></th>
                                        </tr>
                                        <tr>
                                            <th><P>9.Motivating /Counseling students for their betterment</p></th>
                                            <th><input type="radio" name="q9" value="Very Good" required></th>
                                            <th><input type="radio" name="q9" value="Good"></th>
                                            <th><input type="radio" name="q9" value="Average"></th>
                                            <th><input type="radio" name="q9" value="Improvement Needed"></th>
                                        </tr>
                                        <tr>
                                            <th><P>10.Providing course materials and other technical details</p></th>
                                            <th><input type="radio" name="q10" value="Very Good" required></th>
                                            <th><input type="radio" name="q10" value="Good"></th>
                                            <th><input type="radio" name="q10" value="Average"></th>
                                            <th><input type="radio" name="q10" value="Improvement Needed"></th>
                                        </tr>
                                    </table>

			
					<textarea name="Feedback" rows="10" cols="50" placeholder="Feedback" required></textarea>
                    <center><button type="submit" name="submit">Submit</button></center>
				</div>
			</form>
		</article>
    </body>
<?php
	//Obtaining values from Form



	//Connecting to DB
	$conn = $obDBRel->DBConn();

	//Inserting values to Subject Table
$sub=$_POST['SUB'];
$roll=$_SESSION['user'];
$fb=$_POST['Feedback'];
$qw1=$_POST['q1'];
$qw2=$_POST['q2'];
$qw3=$_POST['q3'];
$qw4=$_POST['q4'];
$qw5=$_POST['q5'];
$qw6=$_POST['q6'];
$qw7=$_POST['q7'];
$qw8=$_POST['q8'];
$qw9=$_POST['q9'];
$qw10=$_POST['q10'];
if (isset($_POST['submit'])) {
    if ($sub == '') {
        echo "<script> alert('Please select subject'); </script>";

    } else {
        $sql = "INSERT INTO feedback VALUES (NULL,$roll,'$sub','$fb',$qw1,$qw2,$qw3,$qw4,$qw5,$qw6,$qw7,$qw8,$qw9,$qw10)";
        if ($conn->query($sql) === TRUE)
        {

            echo "<script> alert('Feedback Added!'); location.href = 'student.php'; </script>";
        }

        else
            echo "Error: " . $sql . "<br>" . $conn->error;
        $conn->close();
    }
}
	//Saving Resource
	$conn->close();
?>


</html>