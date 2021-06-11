<?php
session_start();
require '_dbconnect.php';
if(isset($_POST['submit'])){
    $ap=$_POST['a+'];
    $an=$_POST['a-'];
    $bp=$_POST['b+'];
    $bn=$_POST['b-'];
    $abp=$_POST['ab+'];
    $abn=$_POST['b-'];
    $op=$_POST['o+'];
    $on=$_POST['o-'];
    if(isset($_SESSION['username'])){
        $id=$_SESSION['username'][0];
    }
    $sql="SELECT * FROM `bloodavailability` WHERE id_user='$id'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        $sql="UPDATE `bloodavailability` SET `A+` = '$ap', `A-` = '$an', `B+` = '$bp',`B-` = '$bn',`AB+` = '$abp',`AB-` = '$abn',`O+` = '$op',`O-` = '$on'    WHERE `id_user`='$id'";
    }else{
        $sql="INSERT INTO `bloodavailability` (`id_user`, `A+`, `A-`, `B+`, `B-`, `AB+`, `AB-`, `O+`, `O-`) VALUES ('$id', '$ap', '$an', '$bp', '$bn', '$abp', '$abn', '$op', '$on')";
    }
    $result=mysqli_query($conn,$sql);
    if($result){
        $u=1;
    }else{
        $u=0;
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>RAMC Blood Bank</title>
</head>

<body>
    <?php require 'nav.php';

        if(isset($u) && $u==1){
            echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Successfully!</strong> Updated.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }elseif(isset($u) &&$u==0){
            echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <strong>Sorry!</strong> can not update.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        $u=null;
    ?>

    <div class="container my-5" style="width:800px; margin:auto; ">
        <form method="post">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="a+">Quantity of A+ Group :</label>
                    <input type="number" class="form-control" name="a+" id="a+" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="a-">Quantity of A- Group :</label>
                    <input type="number" class="form-control" name="a-" id="a-" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="b+">Quantity of B+ Group :</label>
                    <input type="number" class="form-control" name="b+" id="b+" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="b-">Quantity of B- Group :</label>
                    <input type="number" class="form-control" name="b-" id="b-" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ab+">Quantity of AB+ Group :</label>
                    <input type="number" class="form-control" name="ab+" id="ab+" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ab-">Quantity of AB- Group :</label>
                    <input type="number" class="form-control" name="ab-" id="ab-" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="o+">Quantity of O+ Group :</label>
                    <input type="number" class="form-control" name="o+" id="o+" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="o-">Quantity of O- Group :</label>
                    <input type="number" class="form-control" name="o-" id="o-" required>
                </div>
                <div class="col-md-12 mb-3 text-center">
                    <br>
                    <button type="submit" class="btn btn-danger col-md-6" name="submit" id="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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