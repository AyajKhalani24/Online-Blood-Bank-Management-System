<?php 
    session_start();
    require '_dbconnect.php';
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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        text-align: center;
        width: 100%;
        margin-left: 12px;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
</head>

<body>
    <?php 
    require "nav.php";
    
    if(isset($_COOKIE['login']) && $_COOKIE['login'] == 1 && isset($_SESSION['username'])){
        echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
        <strong>Hello '.$_SESSION['username'][0].'</strong>.  Welcome to our Website
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }

    if(isset($_COOKIE['insert']) && $_COOKIE['insert']==true){
    echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert" id="success">
        <strong>Successfully!</strong> Signup Now try to Login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
    if(isset($_COOKIE['insert']) && $_COOKIE['insert']==false){
        echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert" id="failure">
        <strong>Sorry!</strong> Signup failed.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }

    if(isset($_COOKIE['insert'])){
        setcookie('insert','', time() - 3600 );
    }

    if(isset($_COOKIE['loginstatus']) && $_COOKIE['loginstatus']==1){
        echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <strong>Successfully!</strong> login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        if(isset($_COOKIE['loginstatus']) && $_COOKIE['loginstatus']==0){
            echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
            <strong>Sorry!</strong> Login failed.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
        if(isset($_COOKIE['loginstatus'])){
            setcookie('loginstatus','', time() - 3600 );
        }
        ?>

    <!-- carousel -->
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="2000">
                <img src="image/sl1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="image/sl2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image/sl3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    

    <!-- add content  -->
    <div class="container my-3">
        <h2 class="text-center" style="color: red;">RAMC SERVICES</h2>
        <hr style="width: 10%; border: 2px solid red;">
        <div class="row">

            <div class="col-md-4 text-center">
                <div class="card my-2" style="width: 18rem;">
                    <img src="image/r4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Blood Donation Camp Schedule</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="schedule.php" class="btn btn-danger text-center">Check Schedule</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="card my-2" style="width: 18rem;">
                    <img src="image/r5.jpg" style=" height: 180px;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Blood Banks</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="./schedule.php" class="btn btn-danger text-center" id="donate">Donate Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-center">
                <div class="card my-2" style="width: 18rem;">
                    <img src="image/r6.jpg" style=" height: 160px; margin-top: 20px;" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Blood Availability</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's
                            content.</p>
                        <a href="bloodAvailability.php" class="btn btn-danger text-center">Check It</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style="border: 1px solid black;">

    <!-- Blood Bank info -->
    <div class="container my-3 py-4">
        <h2 class="text-center" style="color: red;">ABOUT DONATION</h2>
        <hr style="border: 2px solid red; width: 10%;">
        <div class="media">
            <img src="image/r8.jpg" class="align-self-center mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0 text-center">Compatible Blood Type Donors</h5>
                <table style="border-collapse: collapse;">
                    <tr>
                        <th>Blood Type</th>
                        <th>Donate Blood To</th>
                        <th>Receive Blood From</th>
                    </tr>
                    <tr>
                        <td>A+</td>
                        <td>A+ AB+</td>
                        <td>A+ A- O+ O-</td>
                    </tr>
                    <tr>
                        <td>O+</td>
                        <td>O+ A+ B+ AB+</td>
                        <td>O+ O-</td>
                    </tr>
                    <tr>
                        <td>B+</td>
                        <td>B+ AB+</td>
                        <td>B+ B- O+ O-</td>
                    </tr>
                    <tr>
                        <td>AB+</td>
                        <td>AB+</td>
                        <td>Everyone</td>
                    </tr>
                    <tr>
                        <td>A-</td>
                        <td>A+ A- AB+ AB-</td>
                        <td>A- O-</td>
                    </tr>
                    <tr>
                        <td>O-</td>
                        <td>Everyone</td>
                        <td>O-</td>
                    </tr>
                    <tr>
                        <td>B-</td>
                        <td>B+ B- AB+ AB-</td>
                        <td>B- O-</td>
                    </tr>
                    <tr>
                        <td>AB-</td>
                        <td>AB+ AB-</td>
                        <td>AB- A- B- O-</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center my-2">
        
        <a href="contact.php" class="text-center btn btn-danger">Contact Us</a>
    </div>

    <!-- Criteria to donate blood  -->
    <div class="jumbotron mb-0 py-5">
        <h1 class="display-5 text-center" style="font-weight: bold; color: red;">CRITERIA TO DONATE BLOOD</h1>
        <hr style="border: 2px solid red; width: 10%;">
        <p class="lead my-3">
            <b>1. Overall health</b>- The donor must be fit and healthy, and should not be suffering from transmittable
            diseases. <br>
            <b>2. Age and weight</b>- The donor must be 18–65 years old and should weigh a minimum of 50 kg. <br>
            <b>3. Pulse rate</b>- Between 50 and 100 without irregularities. <br>
            <b>4. Hemoglobin level</b>- A minimum of 12.5 g/dL. <br>
            <b>5. Blood pressure</b>- Diastolic: 50–100 mm Hg, Systolic: 100–180 mm Hg. <br>
            <b>6. Body temperature</b>- Should be normal, with an oral temperature not exceeding 37.5 °C. <br>
            <b>7. The time period between successive blood donations should be more than 3 months.</b> <br>
        </p>
    </div>

    <?php 
        require "footer.php";
        unset($_COOKIE['loginstatus']);
    ?>

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