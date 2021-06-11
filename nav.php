<?php

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">RAMC Blood Bank</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Services
                </a>';
                if(isset($_SESSION['user']) && $_SESSION['user'] == "HB"){
                    echo'
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="organizeCamp.php" id="camp"> Organize Blood Donation Camp</a>
                    <a class="dropdown-item" href="updatebloodavailability.php">Update Blood Availability</a>
                    </div>';}
                else{
                    echo'
                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="schedule.php">Blood Donation Camp Schedule</a>
                    <a class="dropdown-item" href="bloodbank.php">Blood Banks</a>
                    <a class="dropdown-item" href="bloodAvailability.php">Blood Availability</a>
                    </div>';
                }
            echo'</li>';
            if(isset($_SESSION['user']) && $_SESSION['user'] == "public"){
                echo '<li class="nav-item">
                <a class="nav-link" href="donation.php">Your Donation</a>
                </li>';
            }
            echo'
            <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
        </ul>

        <div class=" row mx-2">';
        
        if(!isset($_COOKIE['login']) || $_COOKIE['login'] == 0){
            echo '<a  href="login.php" class="btn btn-danger text-center ml-2">Login</a>
            <a href="signup.php?signup=P" class="btn btn-danger text-center ml-2">SignUp</a>';
        }
        if(isset($_COOKIE['login']) && $_COOKIE['login'] == 1){
            echo '<a href="_logout.php" class="btn btn-danger text-center ml-2">Logout</a>';
        }
        echo'
        </div>

    </div>
</nav>';

?> 
