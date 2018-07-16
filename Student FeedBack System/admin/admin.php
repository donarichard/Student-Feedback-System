<?php 
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();
?>
<!DOCTYPE html>
	<head>
		<title>Admin Page</title>
		<link rel="stylesheet" type="text/css" href="admin.css">
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

    <center><img src ="../images/logo.png"/></center>
    <center> <h1 style="font-family: 'High Tower Text'">Admin Panel</h1></center>
    <p align="right"><button style="align-items: right;"><a  href="../logout.php">Logout</a></button></p>
		<article>
			<div class=main>
				<div>
					<div class=lnkimg>
						<a href='addfac.php'><img src="../images/add.png"></a>
					</div>
					<div class=shorten>
						<h3>Add  Faculty</h3>
						<p>Click to insert faculty to the database for adding feedback.</p>
					</div>
				</div>
                <div>
                    <div class=lnkimg>
                        <a href='adddep.php'><img src="../images/add.png"></a>
                    </div>
                    <div class=shorten>
                        <h3>Add  Department</h3>
                        <p>Click to insert department to the database for adding feedback.</p>
                    </div>
                </div>
                <div>
                    <div class=lnkimg>
                        <a href='addsub.php'><img src="../images/add.png"></a>
                    </div>
                    <div class=shorten>
                        <h3>Add  Subject</h3>
                        <p>Click to insert subjects to the database for adding feedback.</p>
                    </div>
                </div>
                <div>
                    <div class=lnkimg>
                        <a href='delfac.php'><img src="../images/delete.png"></a>
                    </div>
                    <div class=shorten>
                        <h3>Delete  Faculty</h3>
                        <p>Click to delete faculty from the database.</p>
                    </div>
                </div>
				<div>
					<div class=lnkimg>
						<a href='delsub.php'><img src="../images/delete.png"></a>
					</div>
					<div class=shorten>
						<h3>Delete  Subject</h3>
						<p>Click to delete subjects from the database.</p>
					</div>
				</div>
				<div>
					<div class=lnkimg>
						<a href='addstudent.php'><img src="../images/add.png"></a>
					</div>
					<div class="shorten">
						<h3>Add  Student</h3>
						<p>Click to insert students to the database.</p>
					</div>
				</div>
				<div>
					<div class=lnkimg>
						<a href='delstudent.php'><img src="../images/delete.png"></a>
					</div>
					<div class=shorten>
						<h3>Delete Student</h3>
						<p>Click to delete student present in the database.</p>
					</div>
				</div>

				<div>
					<div class="lnkimg">
						<a href='feedback.php'><img src="../images/feedback.png"></input></a>
					</div>
					<div class="shorten">
						<h3>Get Feedback</h3>
						<p>Click to see all the feedback in the database.</p>
					</div>
				</div>
			</div>
		</article>
	</body>
</html>