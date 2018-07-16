<?php
include "../bucket.php";
$obDBRel = new DBRel;

//Connecting to DB
$conn = $obDBRel->DBConn();
?>
<html>
<head>
    <title>Student Feedback</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <style>
        select {
            height: 50px;
            width:200px;
            padding:3px;
            margin: 0;
            -webkit-border-radius:4px;
            -moz-border-radius:4px;
            border-radius:4px;
            -webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
            -moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
            box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;
            background: #f8f8f8;
            color:#888;
            border:none;
            outline:none;
            display: inline-block;
            -webkit-appearance:none;
            -moz-appearance:none;
            appearance:none;
            cursor:pointer;
        }
    </style>
</head>
<body>
<header>
    <img src ="../images/logo.png"/>
    <center> <h1 style="font-family: 'High Tower Text'">Student FeedBack</h1></center>
    <hr>
</header>
<article>
    Select Department
<select>
    <option>Select</option>
        <?php
        $sql=mysqli_query($conn,"SELECT * FROM `dep`");
        while ($row=mysqli_fetch_assoc($sql)) {

            ?>
            <option><?php echo $row['department']; ?></option>
            <?php
        }

        ?>
</select>
</article>


</body>
</html>