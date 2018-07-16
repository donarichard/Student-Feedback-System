<?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "sa", "root", "studentfeedback");  
 $output = '';  
 if(isset($_POST["brand_id"]))  
 {  
      if($_POST["brand_id"] != '')  
      {  
           $sql = "SELECT staff FROM subject WHERE Sub_Name = '".$_POST["brand_id"]."'";
       $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<h1>Staff Name:&nbsp;&nbsp;'.$row["staff"].'</h1>';
      }  
      echo $output;		   
      }  
      else  
      {  
          echo"Please Select Subject";  
      }  
       
 }  
 ?>  