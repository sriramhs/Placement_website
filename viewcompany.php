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
    <link rel="stylesheet" href="viewcompany.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
</head>
 <body >
    <div >
    <div >
        <button style="font-family: 'Bree Serif', serif; border-radius:5px; background-color:lightgreen; margin-left:40%; width:300px; border:none;"><h1>Company List</h1></button>
        <br>
        <div id="firstTable">   
        <table style="border-collapse: collapse;margin: 25px 0;font-size: 0.9em;min-width: 400px;border-radius: 10px 10px 0 0;overflow: hidden;box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);">
       <thead>
       <tr style="background-color: #009879;color: #ffffff;text-align: left;font-weight: bold;">
           <th style="padding: 20px 15px; border:none;">Company Name</th>
           <th style="padding: 12px 15px; border:none;">Drive Date</th>
           <th style="padding: 12px 15px; border:none;">Min CGPA</th>
           <th style="padding: 12px 15px; border:none;">Branches</th>
           <th style="padding: 12px 15px; border:none;">USN of Registered students</th>
          
           <th style="padding: 12px 15px; border:none;">Registration Status</th>
           
        </tr>
       </thead>
       <tbody>
       <?php
       $con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'db_placement');

           
       $q = "SELECT * from company";
       
       $query = mysqli_query($con,$q);    
       
       while($res = mysqli_fetch_array($query)){

       
       ?>
       
       
        <tr>
           <th style="padding: 17px 15px; border:none;"><?php echo $res['name']?></th>
           <td style="padding: 17px 15px; border:none;"><?php echo $res['drive_date']?></td>
           <td style="padding: 17px 15px; border:none;"><?php echo $res['eligibility'] ?></td>
           <td style="padding: 17px 15px; border:none;"><?php echo $res['branch']?></td>
           
           <td style="padding: 17px 15px; border:none;">
           <?php
               // $arr="";
               $reg="SELECT * from register";
               $new=mysqli_query($con,$reg);
               while($res1=mysqli_fetch_array($new)){
                   if($res['company_id']==$res1['company_id'])
                   {
                       $arr=$res1['usn'];
                       echo $arr." ";
                    }
               }
               
               // echo implode(",",$arr);
               ?>
            </td>
               <td style="padding: 12px 15px; border:none;">
           <?php
           $count=0;
               $reg="SELECT * from register";
               $new=mysqli_query($con,$reg);
               while($res1=mysqli_fetch_array($new)){
                   if($res['company_id']==$res1['company_id'])
                   {
                       $count++;
                   }
               }
               echo $count;
               ?>
               </td>
           
           
           

           
           
       </tr>
       <?php
           
       }
           
       ?>    
       </tbody>
       
       
       
   </table>    

        </div>
        
        
        <a  href="adminhome.php"><button style="font-family: 'Bree Serif', serif;border-radius:10px;color: black;
  background-color: lightgreen;">Back to Home</button></a>
    </div>    
        
    </div>
    
</body>
</html>