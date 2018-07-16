<?php
session_start();
include "../bucket.php";
$obDBRel = new DBRel;
error_reporting(0);
$obDBRel->redirect();

//Connecting to DB
$conn = $obDBRel->DBconn();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Obtaining values from Form
    $sub=$_POST['subject'];

    //Inserting values to Subject Table
    if($sub=="")
        echo "<script> alert('Enter Department name.'); </script>";
    else{
        $sql="INSERT INTO dep VALUES (NULL,'$sub')";
        if ($conn->query($sql) === TRUE)
            echo "<script> alert('Department Added!'); </script>";
        else
            echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//Saving Resource
$conn->close();
?>
<!DOCTYPE html>
<head>
    <title>Add Department - Admin</title>
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
    </style>
</head>
<body>
<a href='admin.php'><img src="../images/back.png" align="left" height="50px"></a>
<center><img src ="../images/logo.png"/></center>
<h1 align="center">Admin Panel</h1>
<p align="right"><button style="align-items: right;"><a  href="../logout.php">Logout</a></button></p>
<article>
    <h1>Add a Department:</h1>
    <form action=adddep.php method=post>
        <div class=input>
            <input type=text name=subject placeholder="Department Name" required>
            <button type=submit name="ADD">Add</button>
        </div>
        <div class=output>
            <?php
            $obDBRelb = new DBRel;
            $conn=$obDBRelb->DBConn();
            $sql="Select * from dep order by id asc";
            $result = $conn->query($sql);

            echo "<table class=slist>";
            echo "<tr>";
            echo 	"<th>Department Name</td>";
            echo "</tr>";

            if($result->num_rows > 0)
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo 	"<td>" . $row["department"] . "</td>";
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