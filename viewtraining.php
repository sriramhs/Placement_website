<?php
session_start();
include("function.php");
initiate();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Company</title>
    <link rel="stylesheet" href="viewtraining.css">
    
</head>
 <body>
    <div >
    <div >
    <button style="font-family: 'Bree Serif', serif; border-radius:5px; background-color:lightgreen; margin-left:40%; width:300px; border:none;"><h1>Training Details</h1></button>
        <table  style="border-collapse: collapse;margin: 25px 0;font-size: 0.9em;min-width: 400px;border-radius: 10px 10px 0 0;overflow: hidden;box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);">
       <br >
       <thead>
       <tr style="background-color: #009879;color: #ffffff;text-align: left;font-weight: bold;">
            <th style="padding: 20px 15px; border:none;">Training course</th>
            <th style="padding: 20px 15px; border:none;">Faculty Name</th>
            <th style="padding: 20px 15px; border:none;">Scheduled Date</th>
            <th style="padding: 20px 15px; border:none;">Time</th>
            <th style="padding: 20px 15px; border:none;">Venue</th>
            </tr>
       </thead>
       <tbody>
       <?php
        $con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'db_placement');

            
        $q = "SELECT * from training";
        
        $query = mysqli_query($con,$q);    
        
        while($res = mysqli_fetch_array($query)){

        
        ?>
        
        
         <tr>
            <th style="padding: 17px 15px; border:none;"><?php echo $res['training_course']?></th>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['faculty_name']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['schedule'] ?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['time']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['venue']?></td>
            
            

            
            
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