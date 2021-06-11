<?php session_start();?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>About Us</title>
</head>

<body>
    <?php
        require 'nav.php';
    ?>

    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
                <img src="image\sl1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-interval="2000">
                <img src="image\sl2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="image\sl3.jpg" class="d-block w-100" alt="...">
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
    <div style="height:86vh;">
        <div>
            <div>
                <img src="image/r10.jpg" alt="..." style=" position:absolute; margin-left: 750px; height: 250px">
            </div>
            <h1 class="text-left" style="color: red; color: red; margin-top: 80px; margin-left: 120px;">OUR MISSION</h1>
            <hr style="width: 4%; border: 2px solid red; margin: 10px 125px">
            <p style="margin: 30px 120px; width: 40%;">I want this blog to be popular all over the world and most of the
                people visit this blog or website and read
                the updated news every day.</p>
            <p style="margin: 30px 120px; width: 40%;">Also I want this blog to be ranked top on Google. I want this
                blog to be the No. 1 news blog first in India
                and then in the whole world. </p>

        </div>

        <div>

            <div>
                <h4 class="text-left" style="color: red; margin-top: 4px; margin-left: 800px; position: absolute;">Our
                    Core Values</h4>
                <hr style="width: 4%; border: 2px solid red; margin: 40px 806px; position: absolute;">
                <p style="margin: 70px 800px; width: 40%; position: absolute;">You know that Core values are the
                    fundamental beliefs of a person or organization.</p>
                <p style="margin: 130px 810px; position: absolute;">Honesty.</p>
                <p style="margin: 160px 810px; position: absolute;">Creativity.</p>
                <p style="margin: 190px 810px; position: absolute;">Respect. </p>
            </div>
            <h4 class="text-left" style="color: red; color: red; margin-top: 100px; margin-left: 120px;">Extraordinary
                Experiences</h4>
            <hr style="width: 4%; border: 2px solid red; margin: 0px 125px">
            <p style="margin: 30px 120px; width: 40%;">This is my First Blog.. so I don’t have any extraordinary
                experience about news blog but I have knowledge about news blog and I know how It’s work and how it’s
                helpful for many people.</p>
            <p style="margin: 30px 120px; width: 40%;">I hope People will like this blog and help me to grow up my
                experience.</p>
        </div>
    </div>
    <?php require 'footer.php';?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>