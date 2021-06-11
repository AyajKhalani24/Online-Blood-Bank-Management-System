<?php
session_start();
require '_dbconnect.php';
// $name="";
// $email=""; 
// $catagory=""; 
// $phone="";
if(!isset($_COOKIE['login']) || $_COOKIE['login'] == 0){
    if($_SESSION['user'] == 'HB'){
        echo"Your are not public user";
    }else{
        header("location:login.php");
    }
}
if(isset($_SESSION['user'])){
    $id=$_SESSION['user'][0];
}

$oraganizer=$_GET['id'];
// echo $oraganizer;

$sql="SELECT * FROM `user01` WHERE `id_user` = '". $oraganizer ."';";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result)) {
    $org_name=$row[1];
    $org_email=$row[2];
    $catagory=$row[3];
    $city=$row[5];
    // $orgphone=$row[6];
}

$sql="SELECT * FROM `camp` WHERE `id_user` = '". $oraganizer ."';";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result)) {
    $pnumber=$row[2];
    $snumber=$row[3];
    $address=$row[6];
    $date=$row[4];
    $time=$row[5];
    // $orgphone=$row[6];
}
$sql="SELECT * FROM `user02` WHERE `id_user` = '".$_SESSION['username'][0]."';";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result)) {
    $user_name=$row[2];
    $user_email=$row[1];
    // $catagory=$row[3];
    $user_mobile=$row[3];
    $gender=$row[4];
    $bloodgroup=$row[5];
    $dob=$row[6];
}

if (isset($_POST['submit'])) {
    
    $sql="CREATE TABLE IF NOT EXISTS `bbms`.`".$_SESSION['username'][0]."` (`org_id` VARCHAR(20) NOT NULL , `oraganizer` VARCHAR(40) NOT NULL , `org_email` VARCHAR(40) NOT NULL , `date_of_camp` DATE NOT NULL , `city` VARCHAR(20) NOT NULL)  ENGINE = InnoDB";
    $result=mysqli_query($conn,$sql);

    if(!$result){
        echo "Error in connection:".mysqli_error($conn);
    }

    $sql="INSERT INTO `".$_SESSION['username'][0]."` (`org_id`, `oraganizer`, `org_email`, `date_of_camp`, `city`) VALUES ('$oraganizer', '$org_name', '$org_email', '$date', '$city')";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Confirm";
    }else{
        echo "failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Apply for Blood donation</title>
</head>

<body style="width:100%;">
    <?php require 'nav.php';
    echo '
    <div class="container my-5" style="width:65%;margin:auto;">
    <h2 class="my-4">Confirme your detail</h3>
        <table class="table table-striped" style="width:100%; margin: auto;">
        <tbody>
            <tr>
                <th scope="col">Oraganizer</th>
                <td scope="c">'.$org_name.'</td>
            </tr>
                <tr>
                    <th scope="row">Onganizer`s Email</th>
                    <td>'.$org_email.'</td>
                </tr>
                <tr>
                    <th scope="row">Your Name:</th>
                    <td>'.$user_name.'</td>
                </tr>
                <tr>
                    <th scope="row">Your Email</th>
                    <td>'.$user_email.'</td>
                </tr>
                <tr>
                    <th scope="row">Your Mobile</th>
                    <td>'.$user_mobile.'</td>
                </tr>
                <tr>
                    <th scope="row">Your Blood Group</th>
                    <td>'.$bloodgroup.'</td>
                </tr>
                <tr>
                    <th scope="row">Date of Birth</th>
                    <td>'.$dob.'</td>
                </tr>
                <tr>
                    <th scope="row">Gender</th>
                    <td>'.$gender.'</td>
                </tr>
                <tr>
                <th scope="row">Mobile No of Organizer</th>
                <td>'.$pnumber.' , '.$snumber.'</td>
                </tr>
                <tr>
                    <th scope="row">Address of Camp</th>
                    <td>'.$address.'</td>
                </tr>
                <tr>
                    <th scope="row">City</th>
                    <td>'.$city.'</td>
                </tr>
                <tr>
                    <th scope="row">Date of Camp</th>
                    <td>'.$date.'</td>
                </tr>
                <tr>
                    <th scope="row">Time</th>
                    <td>'.$time.'</td>
                </tr>
            </tbody>
        </table>
        <form action="apply.php?id='.$oraganizer.'" method="post">
            <!-- <button type="submit" class="btn btn-danger my-4">Submit</button> -->
            <input type="submit" value="Submit" name="submit" class="btn btn-danger my-4">
        </form>
    </div>';
    // echo ';
?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>
</body>

</html>