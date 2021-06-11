<?php 
session_start();
require '_dbconnect.php';
$_SESSION['emailMatch']="90";
$flage=false;
$t=1;
$f=0;
$i=0;
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    
    $sql="SELECT `email` FROM `user01`";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)) {
        if($email == $row[0]){
            $_SESSION['emailMatch'] = $t;
            $flage=true;
            break;
        }
        else{
            $_SESSION['emailMatch'] = $f;
        }
    }
    
    if ($flage) {
        $pnumber = $_POST['pnumber'];
        $snumber = $_POST['snumber'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $address = $_POST['address'];
        $id = explode('@',$email)[0];
        $city = $_POST['city'];
        
        $sql = "INSERT INTO `camp`(`id_user`,`Email`, `Primary_number`, `Secondary_Number`, `date`, `Time`, `city`, `Address`) VALUES ('$id','$email', '$pnumber', '$snumber', '$date', '$time', '$city', '$address')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $sql="SELECT `email` FROM `user02`";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($result)) {
                    $to=$row[0];
                    $sub="Organization of blood donation camp.";
                $message="We are organizing blood donation camp in your city we request to join this camp.";
            
                ini_set("SMTP","localhost");
                ini_set("smtp_port","25");
                    if(mail($to,$sub,$message)){
                        $sendmail = true;
                    }
                    else{
                        $sendmail = false;
                    }
                }
            }
           else{
               echo mysqli_error($conn);
            }
        }
    }
    
    ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Organize Camp</title>
</head>

<body>
    <?php require 'nav.php';
    if(isset($_SESSION['emailMatch']) && $_SESSION['emailMatch'] == 1){
        echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" id="success">
        <strong>Successfully!</strong> Camp Organized.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }else if(isset($_SESSION['emailMatch']) && $_SESSION['emailMatch'] == 0){
        echo'<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" id="failure">
        <strong>Sorry!</strong> Enter email is not register with us. Please enter registered email.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
    ?>

    <div class="container my-5" style="width:800px; margin:auto; ">
        <form method="Post" action="organizeCamp.php">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="pnumber">Primary Number</label>
                <input type="tel" class="form-control" id="pnumber" name="pnumber" maxlength="10" minlength="10">
            </div>
            <div class="form-group">
                <label for="snumber">Secondary Number</label>
                <input type="tel" class="form-control" id="snumber" name="snumber" maxlength="10" minlength="10">
            </div>
            <div class="form-group">
                <label for="date">Date of Organizing:</label>
                <input type="date" class="form-control" id="date" name="date" min="<?php echo date('Y-m-d')?>">
            </div>
            <div class="form-group">
                <label for="time">Time</label>
                <input type="text" class="form-control" id="time" name="time">
            </div>
            <div class="d-flex">
            <div class="dropdown mr-1">
                <select class="btn btn-light dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" data-offset="10,20" name="city" required>
                    <option class="dropdown-item" selected>Select City</option>>
                    <option class="dropdown-item" value="Ahmedabad">Ahmedabad</option>
                    <option class="dropdown-item" value="Amrelli">Amreli</option>
                    <option class="dropdown-item" value="Anand">Anand</option>
                    <option class="dropdown-item" value="Arvalli">Arvalli</option>
                    <option class="dropdown-item" value="Banaskantha">Banaskantha</option>
                    <option class="dropdown-item" value="Bharuch">Bharuch</option>
                    <option class="dropdown-item" value="Bhavnagar">Bhavnagar</option>
                    <option class="dropdown-item" value="Botad">Botad</option>
                    <option class="dropdown-item" value="Chhota Udaipur">Chhota Udaipur</option>
                    <option class="dropdown-item" value="Dahod">Dahod</option>
                    <option class="dropdown-item" value="Dang">Dang</option>
                    <option class="dropdown-item" value="Devbhoomi Dwarka">Devbhoomi Dwarka</option>
                    <option class="dropdown-item" value="Gandhinagar">Gandhinagar</option>
                    <option class="dropdown-item" value="Gir Somnath">Gir Somnath</option>
                    <option class="dropdown-item" value="Jamnagar">Jamnagar</option>
                    <option class="dropdown-item" value="Jungadh">Junagadh</option>
                    <option class="dropdown-item" value="Kutch">Kutch</option>
                    <option class="dropdown-item" value="Kheda">Kheda</option>
                    <option class="dropdown-item" value="Mahisagar">Mahisagar</option>
                    <option class="dropdown-item" value="Mehsana">Mehsana</option>
                    <option class="dropdown-item" value="Morbi">Morbi</option>
                    <option class="dropdown-item" value="Narmada">Narmada</option>
                    <option class="dropdown-item" value="Navsari">Navsari</option>
                    <option class="dropdown-item" value="Panchmahal">Panchmahal</option>
                    <option class="dropdown-item" value="Patan">Patan</option>
                    <option class="dropdown-item" value="Porbandar">Porbandar</option>
                    <option class="dropdown-item" value="Rajkot">Rajkot</option>
                    <option class="dropdown-item" value="Sabarkantha">Sabarkantha</option>
                    <option class="dropdown-item" value="Surat">Surat</option>
                    <option class="dropdown-item" value="Surendranagar">Surendranagar</option>
                    <option class="dropdown-item" value="Tapi">Tapi</option>
                    <option class="dropdown-item" value="Vadodara">Vadodara</option>
                    <option class="dropdown-item" value="Valsad">Valsad</option>
                </select>
            </div>
        </div><br>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger" name="submit" id="submit">Submit</button>
            </div>
        </form>
    </div>
    <?php require 'footer.php'?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

</body>

</html>
<?php
// setcookie('emailMatch','',time()-3600);
unset($_SESSION['emailMatch']);
?>