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

    $sql = "SELECT faculty_name FROM faculty";
    $result = $conn->query($sql);

    //Inserting values in dropdown
    echo "<select name='SUB'>";
    echo "<option value='subject'>Faculty</option>";

    if ($result->num_rows > 0)
        while ($row = $result->fetch_assoc())
            echo "<option value='" . $row['faculty_name'] . "'>" . $row['faculty_name'] . "</option>";
    else
        echo "0 results";
    echo "</select>";

    //Saving Resource
    $conn->close();
}
?>
<!DOCTYPE html>
<head>
    <title>Delete Subject - Admin</title>
    <link rel="stylesheet" type="text/css" href="delsub.css">
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
    <h1>Delete a Record from Faculty:</h1>
    <form action="delfac.php" method=POST>
        <div class=input>
            <?php abc(); ?>
            <button type=submit>Delete</button>
        </div>
        <div class=output>
            <?php
            $obDBRelb = new DBRel;
            $conn=$obDBRelb->DBConn();

            $sql="SELECT * FROM faculty order by id";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                echo "<table class=slist>";
                echo "<tr>";
                echo 	"<th>ID</td>";
                echo 	"<th>Faculty Name</td>";
                echo "</tr>";
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo 	"<td>" . $row["id"] . "</td>";
                    echo 	"<td>" . $row["faculty_name"] . "</td>";
                    echo "</tr>";
                }
            }
            else
                echo "<div align='center' style='font-size:20px'>No Records.</div>";

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                $sql="Delete from faculty where faculty_name='".$_POST['SUB']."'";
                $result = $conn->query($sql);

                if ($conn->query($sql) === TRUE){
                    echo "<script> alert('Faculty Deleted!'); </script>";
                    header('Location:delfac.php');
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