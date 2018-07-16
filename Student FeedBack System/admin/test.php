<?php
$n=1662501;
$a=1662560;
for($i=$n;$i<$a;$i++)
{
    $b=$i;
    echo $i;
}

while($row = $result->fetch_assoc())
    if(trim($_POST['user']) == trim($row['regno']) && trim($_POST['pass']) == trim($row['regno']))
        $flag = 1;

if($flag == 1)
    header('Location:../student/student.php');

?>