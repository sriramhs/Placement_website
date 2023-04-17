<?php
  
session_start();
include("function.php");
initiate();
$var=$_SESSION['login_user'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Company</title>
    <link rel="stylesheet" href="RegisterCompany.css">
    <style>
        tr:nth-child(even) {
        background-color: white;
        }
    </style>
   
</head>
 <body>
    <div >
    <div >
    <button style="font-family: 'Bree Serif', serif; border-radius:5px; background-color:lightgreen; margin-left:40%; width:300px; border:none;"><h1>Company List</h1></button>
        <br >
        <table style="border-collapse: collapse;margin: 25px 0;font-size: 0.9em;min-width: 400px;border-radius: 10px 10px 0 0;overflow: hidden;box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);" >
        <thead>
            <tr style="background-color: #009879;color: #ffffff;text-align: left;font-weight: bold;">
            <th style="padding: 20px 15px; border:none;">Company Name</th>
            <th style="padding: 20px 15px; border:none;">Drive Date</th>
            <th style="padding: 20px 15px; border:none;">Min CGPA</th>
            <th style="padding: 20px 15px; border:none;">Branches</th>
            <th style="padding: 20px 15px; border:none;">Register</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $con = mysqli_connect('localhost','root');

mysqli_select_db($con, 'db_placement');

            
        $q = "SELECT * from company";
//         $ten="SELECT 10th from student where name='{$var}'";
//         // $ten1=mysqli_query($con,$ten);
//  $twelve="SELECT 12th from student where name='{$var}'";
//  $BE="SELECT BE from student where name='{$var}'";
//  $branch="SELECT branch from student where name='{$var}'";
  $usn="SELECT usn from student where name='{$var}'";
  $usn_query = mysqli_query($con,$usn); 
  $my=mysqli_fetch_array($usn_query)  ;
        $query = mysqli_query($con,$q);    
        
        while($res = mysqli_fetch_array($query)){
            
        
        ?>
        
        
         <tr>
        <form action="" method="post">
        
            <td style="padding: 17px 15px; border:none;"><input type="text" value="<?php echo $res['name']?>" name="c_name" style=" border:none; font-size:16px;background-color:white;" readonly></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['drive_date']?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['eligibility'] ?></td>
            <td style="padding: 17px 15px; border:none;"><?php echo $res['branch']?></td>
            
    
            <td style="padding: 17px 15px; border:none;"><input type="submit" value="Register" name="myreg" style="padding:10px;background-color:#009879; border-radius:5px; border:none; color:white;" ></td>
        </form>
            
            
            

            
            
        </tr>
        <?php
            
        }
            
        ?>
        </tbody>    
    </table>  
    <?php
 $con = mysqli_connect('localhost','root');

 mysqli_select_db($con, 'db_placement');
 
 if(isset($_POST['myreg'])){
     $b= $_POST['c_name'];
     $comp_eleg="SELECT eligibility,branch from company where name='{$b}'";
     $stud_eleg = "SELECT 10th,12th,BE,branch from STUDENT where name='{$var}'";
     $cd = mysqli_query($con, $comp_eleg);
     $sd = mysqli_query($con, $stud_eleg);
    $arr1 = mysqli_fetch_array($cd);
    $arr2 = mysqli_fetch_array($sd);
    $comp_el=$arr1['eligibility'];
    $ten_el=$arr2['10th'];
    $twe_el=$arr2['12th'];
    $be_el=$arr2['BE'];
    // echo $be_el;
    // echo $comp_el;
    // $br1=$arr1['branch'];
    // $br2=$arr2['branch'];
    // echo $comp_el;
    // echo $ten_el;
    // echo $twe_el;
    // echo $be_el;

    // print_r($arr1);
    // print_r($arr2);
     $arr3[] = $arr1['branch'];
    // for($i=0;$i<sizeof($arr3);$i++){
    //     if($arr2['branch']==$arr3[$i])
    //     echo "match";
    //     else
    //     echo "no match";
    // }
     $flag=0;
    $str1=$arr2['branch'];
    foreach($arr3 as $row)
    {
        $str=$row;
    }
    $str2=explode(",",$str);
    foreach($str2 as $row1)
    {
        if($row1==$str1)
        $flag=1;
        break;
    }
    $f= $my['usn'];
    if($flag==1){

    
 $sql="SELECT * from company where name='{$b}' and $ten_el>=$comp_el and $twe_el>=$comp_el and $be_el>=$comp_el";

                      $rr = mysqli_query($con, $sql);
                      $a=mysqli_fetch_array($rr);
                      $count=mysqli_num_rows($rr);
                      $f1=$a['company_id'];
                    //   echo $f1;
                    //echo $count;
                      if($count==1){
                          $one="INSERT into register(usn,company_id) values('$f','$f1')";
                          mysqli_query($con, $one);
                       $message = "Student Registered successfully";
                       echo "<script type='text/javascript'>alert('$message');
                         window.location.replace(\"RegisterCompany.php\");</script>";
                     } else{
                         $mes = "You are not eligible";
                          echo "<script type='text/javascript'>alert('$mes');
                         window.location.replace(\"RegisterCompany.php\");</script>";
                     }
                    }
                    
                    else
                    {
                        $message = "You are not eligible";
                         echo "<script>alert('$message');
                         window.location.replace(\"RegisterCompany.php\");</script>";

                    }
            }
        ?>  
        
        <a  href="StudentHome.php"><button style="margin-left: 45%;margin-top:20px;padding:10px;border-radius:10px;background-color:lightgreen; border:none;">Back to home</button></a>
    </div>    
        
    </div>
    
</body>
</html>