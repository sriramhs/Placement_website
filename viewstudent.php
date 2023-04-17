

<?php
  
session_start();
include("function.php");
initiate();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Student</title>
    <link rel="stylesheet" href="viewtraining.css">
</head>
 <body>
    <div >
    <div >
    <button style="font-family: 'Bree Serif', serif; border-radius:5px; background-color:lightgreen; margin-left:40%; width:300px; border:none;"><h1>Student Details</h1></button>
    <br >
    <table style="border-collapse: collapse;margin: 25px 0;font-size: 0.9em;min-width: 400px;border-radius: 10px 10px 0 0;overflow: hidden;box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);">
       
    <thead>
        <tr style="background-color: #009879;color: #ffffff;text-align: left;font-weight: bold;">
            <th style="padding: 20px 15px; border:none;">Name</th>
            <th style="padding: 20px 15px; border:none;">USN</th>
            <th style="padding: 20px 15px; border:none;">Email</th>
            <th style="padding: 20px 15px; border:none;">DOB</th>
            <th style="padding: 20px 15px; border:none;">Address</th>
            <th style="padding: 20px 15px; border:none;">State</th>
            <th style="padding: 20px 15px; border:none;">Branch</th>
            <th style="padding: 20px 15px; border:none;">Gender</th>
            <th style="padding: 20px 15px; border:none;">10th</th>
            <th style="padding: 20px 15px; border:none;">12th</th>
            <th style="padding: 20px 15px; border:none;">BE</th>
        </tr>
    </thead>
    <tbody>   
        <?php
        $con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'db_placement');

            
        $q = "SELECT * from student";
        
        $query = mysqli_query($con,$q);    
        
        while($res = mysqli_fetch_array($query)){

        
        ?>
        
        
         <tr>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['name']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['usn']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['email'] ?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['DOB']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['address']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['state']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['branch']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['gender'] ?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['10th']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['12th']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['BE']?></td>
            
        </tr>
        <?php
            
        }
            
        ?> 
    </tbody>       
    </table>    
        
    <a  href="adminhome.php"><button style="font-family: 'Bree Serif', serif;border-radius:10px;color: black;
  background-color: lightgreen;">Back to home</button></a>
    </div>    
        
    </div>
    
</body>
</html>
