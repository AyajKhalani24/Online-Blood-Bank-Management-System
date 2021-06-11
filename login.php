<?php
    session_start();
    require '_dbconnect.php';
    $t=1;
    $f=0;
    if(isset($_POST['login'])){
        $option=$_POST['Loginoption'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        if ($option == "public") {
            $_SESSION['user']='public';
            $sql="SELECT * FROM `user02` WHERE Email ='$email' AND Password='$password'";
            $result=mysqli_query($conn,$sql);
        }elseif($option == "HB"){
            $_SESSION['user']='HB';
            $sql="SELECT * FROM `user01` WHERE Email ='$email' AND Password='$password'";
            $result=mysqli_query($conn,$sql);
        }   
        if(mysqli_num_rows($result)>0){
            $_SESSION['username']=explode('@',$email);
            setcookie('loginstatus',$t,time() + 3600);
            setcookie('login',$t,time() + 3600);
        }
        else{
            setcookie('loginstatus',$f,time() + 3600);
            setcookie('login',$f,time() + 3600);
        }
        header("location:index.php");
    }

    //  Login with google php code
        //Include Configuration File
        include('config.php');

        $login_button = '';


        if(isset($_GET["code"]))
        {

        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


        if(!isset($token['error']))
        {
        
        // $google_client->setAccessToken($token['access_token']);

        
        // $_SESSION['access_token'] = $token['access_token'];


        // $google_service = new Google_Service_Oauth2($google_client);
        // $_SESSION['username']=explode('@',$email);
        //     setcookie('loginstatus',$t,time() + 3600);
        //     setcookie('login',$t,time() + 3600);

        
        // $data = $google_service->userinfo->get();

        
        // if(!empty($data['given_name']))
        // {
        // $_SESSION['user_first_name'] = $data['given_name'];
        // }

        // if(!empty($data['family_name']))
        // {
        // $_SESSION['user_last_name'] = $data['family_name'];
        // }

        // if(!empty($data['email']))
        // {
        // $_SESSION['user_email_address'] = $data['email'];
        // }

        // if(!empty($data['gender']))
        // {
        // $_SESSION['user_gender'] = $data['gender'];
        // }

        // if(!empty($data['picture']))
        // {
        // $_SESSION['user_image'] = $data['picture'];
        // }
        }else{
            setcookie('loginstatus',$f,time() + 3600);
            setcookie('login',$f,time() + 3600);
        }
        header("location:index.php");
        }


        // if(!isset($_SESSION['access_token']))
        // {

        // $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
        // }


    ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>RAMC Blood Bank</title>
</head>

<body>
    <?php require 'nav.php';?>

    <div class="container my-5" style="width:800px;margin:auto;">
        <form method="POST" action=<?php echo $_SERVER['PHP_SELF']?>>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Loginoption" id="public" value="public" checked>
                <label class="form-check-label" for="public">
                    For Public
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Loginoption" id="HB" value="HB">
                <label class="form-check-label" for="HB">
                    For Hospital/Blood Bank
                </label>
            </div><br><br>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                    name="email" id="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="">
            </div>
            <button type="submit" name="login" class="btn btn-danger" id="login">Login</button>
        </form>
    </div>

    <div class="container">
   <div class="panel panel-default">
   <?php
   
    echo '<div align="center">'.$login_button . '</div>';
   
   ?>
   </div>
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
    <script>
        const email = document.getElementById('email');
        const password = document.getElementById("password");

        email.addEventListener('blur', () => {
            let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
            let str = email.value;
            if (regex.test(str)) {
                email.classList.remove('is-invalid');
            }
            else {
                email.classList.add('is-invalid');
            }
        })

        password.addEventListener('blur', () => {
            let regex = /^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
            let str = password.value;
            if (regex.test(str)) {
                password.classList.remove('is-invalid');
            }
            else {
                password.classList.add('is-invalid');
            }
        });

        let login = document.getElementById('login');
        login.addEventListener('click', (e) => {
            let invalid = document.getElementsByClassName('is-invalid');
            if (invalid.length > 0) {
                e.preventDefault();
            }
        });
    </script>
</body>

</html>


<!-- echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
    echo '<h3><a href="logout.php">Logout</h3></div>'; -->
