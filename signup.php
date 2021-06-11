<?php
session_start();
require '_dbconnect.php';
if (isset($_GET['signup'])) {
    $signup = $_GET['signup'];
}
if ($signup == 'P') {
    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $bloodgroup = $_POST['bloodgroup'];
        $city = $_POST["city"];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $id = explode('@',$email)[0];

        if ($password == $cpassword) {
            $sql = "INSERT INTO `user02` (`id_user`,`Email`, `Name`, `Mobile No.`, `Gender`, `Blood Group`, `DOB`,`City`,`Password`, `Time`) VALUES ('$id','$email', '$name', '$mobile', '$gender', '$bloodgroup', '$dob','$city','$password', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                setcookie('insert', '1', time() + 3000);
                header("location:index.php");
            } else {
                setcookie('insert', '0', time() + 3000);
                header("location:index.php");
            }
        }
    }
} elseif ($signup == 'HB') {
    if (isset($_POST['hbsignup'])) {

        $name = $_POST["fullname"];
        $email = $_POST["email"];
        $add = $_POST["add"];
        $catagory = $_POST['catagory'];
        $city = $_POST["city"];
        $tel = $_POST["tel"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $id = explode('@',$email)[0];
        if ($password = $cpassword) {
            $sql="INSERT INTO `user01` (`id_user`, `Name`, `Email`, `catagory`, `Address`, `City`, `Telephone No`, `Password`, `Time`) VALUES ('$id', '$name', '$email', '$catagory', '$add', '$city', '$tel', '$password', current_timestamp())";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                setcookie('insert', '1', time() + 3000);
                header("location:index.php");
            } else {
                setcookie('insert', '0', time() + 3000);
                header("location:index.php");
            }
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

    <title>RAMC Blood Bank</title>
</head>

<body>
    <?php
    require 'nav.php';



    if ($signup == 'P') {
        echo '<h2 class=text-center>Signup for Public</h2>
        
    <div class="container my-5" style="width:800px; margin:auto; ">
        <div>
            <a href="signup.php?signup=HB" class="btn btn-danger" id="HB">Hospital/Blood Bank</a>
            <a href="signup.php?signup=P" class="btn btn-danger" id="P">Public</a>
        </div><br>
        <form method="POST" action="signup.php?signup=P">
    <div class="form-group">
        <label for="name">Full Name</label>
        <input type="Text" class="form-control" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
        <small id="emailHelp" class="form-text text-muted">We will never share your email with
            anyoneelse.</small>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Mobile Number</label>
        <input type="phone" class="form-control" name="mobile" id="mobile" maxlength="10" required>
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
        <label for="DOB">Birth Date</label>
        <input type="date" class="form-control" id="dob" name="dob" required>
        <small class="form-text text-muted">Age must be 18 or above</small>
    </div>
    <div>
        <label><b>Gender: </b> </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="gender1" value="male" required>
            <label class="form-check-label" for="male">Male</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="gender2" value="female" required>
            <label class="form-check-label" for="female">Female</label>
        </div>
    </div><br>
    <div class="d-flex">
        <div class="dropdown mr-1">
            <select class="btn btn-light dropdown-toggle" id="bloodgroup" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" data-offset="10,20" name="bloodgroup" required>
                <option class="dropdown-item" selected>Select Blood Group</option>
                <option class="dropdown-item" value="A+">A+</option>
                <option class="dropdown-item" value="A-">A-</option>
                <option class="dropdown-item" value="B+">B+</option>
                <option class="dropdown-item" value="B-">B-</option>
                <option class="dropdown-item" value="AB+">AB+</option>
                <option class="dropdown-item" value="AB-">AB-</option>
                <option class="dropdown-item" value="O+">O+</option>
                <option class="dropdown-item" value="O-">O-</option>
            </select>
        </div>
    </div><br>

    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="password" autocomplete required>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" id="cpassword" autocomplete required>
    </div>
    <div>
        <button type="submit" class="btn btn-danger" name="signup" id="signup">SignUp</button>
        </form>
    </div>';
    } elseif ($signup == 'HB') {
        echo ' <h2 class=text-center>Signup for Hospital/Blood Bank</h2>
        <div class="container my-5" style="width:800px; margin:auto; ">
        <div>
            <a href="signup.php?signup=HB" class="btn btn-danger" id="HB">Hospital/Blood Bank</a>
            <a href="signup.php?signup=P" class="btn btn-danger" id="P">Public</a>
        </div><br>
        <form action="signup.php?signup=HB" method="Post">
        <div class="form-group">
            <label for="fullname">Hospital/Blood bank name</label>
            <input type="text" class="form-control" id="name" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="add">Address</label>
            <textarea name="add" class="form-control" id="add" required></textarea>
        </div><br>
        <div class="form-check form-check-inline">
            <label>Catagory:</label>    
        </div>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="catagory" value="Goverment">
        <label class="form-check-label" for="Loginoption">
            Goverment
        </label>
    </div>
    
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="catagory" value="Private">
        <label class="form-check-label" for="Loginoption">
            Private
            </label>
        </div><br><br>
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
            <label for="tel">Telephone Number</label>
            <input type="phone" class="form-control" id="mobile" maxlength="10" name="tel" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" autocomplete required>
        </div>

        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword" autocomplete required>
        </div>
        <div>
            <button type="submit" class="btn btn-danger" id="signup" name="hbsignup">SignUp</button>
        </div>
    </form>
    </div>';
    }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="/DE-Project-main/validation.js"></script>
</body>

</html>