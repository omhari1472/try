
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .formBox {
            width: 45%;
            margin: 20px auto;
            background-color: rgb(200, 200, 200);
            height: auto;
            padding: 20px;
        }
        form{
            margin-top: 1rem;
        }
    </style>
</head>

<body style="background-color: rgb(92, 92, 92);">
    <nav class="navbar navbar-expand-lg" style="background-color:#a3f2ac;">
        <!-- <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="greenReviveLOGO.png" alt="Logo" width="30" height="25" class="d-inline-block align-text-top">
            <b>GreenRevive</b>
          </a>
        </div> -->
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">GreenRevive</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.html">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="redeem.html">Redeem Points</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="faq.html">FAQ</a>
                    </li>
                    <li>
                        <a class="nav-link" href="user.html">SIGN UP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <!-- <form class="formBox">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> -->
        <div class="formBox">


            <p>Click the button to get your coordinates.</p>

            <button class="btn btn-secondary" onclick="getLocation()">Get Location</button>
            <form action="" id="contactForm" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" id="latitudeInput" name="latitude" placeholder="Latitude"
                        aria-label="First name">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="longitudeInput" name="longitude" placeholder="Longitude"
                        aria-label="Last name">
                    </div>
                      
                      <script>
                      var latitudeInput = document.getElementById("latitudeInput");
                      var longitudeInput = document.getElementById("longitudeInput");
                      
                      function getLocation() {
                        if (navigator.geolocation) {
                          navigator.geolocation.getCurrentPosition(showPosition);
                        } else { 
                          latitudeInput.value = "Geolocation is not supported by this browser.";
                          longitudeInput.value = "Geolocation is not supported by this browser.";
                        }
                      }
                      
                      function showPosition(position) {
                        latitudeInput.value = position.coords.latitude;
                        longitudeInput.value = position.coords.longitude;
                      }
                      </script>
                   
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" aria-label="text">
                    </div>
                    <div class="col">
                        <select class="form-select" id="toggle" name="type" aria-label="Default select example">
                            <option selected>Type</option>
                            <option value="3">Plastic</option>
                            <option value="3">E-waste</option>
                            <option value="3">Tyres</option>
                            <option value="3">Med-waste</option>
                        </select>
                    </div>
                    <div>
                        <div class="mb-3">
                            <br>
                            <label for="exampleFormControlTextarea1" name="address" class="form-label">Address</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-light" name="submit">Submit</button>
            </form>
        </div>
</body>

</html>



<?php
session_start();

include("connection.php");

if(isset($_POST['submit'])) {

    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $name = $_POST["name"];
    $type = $_POST["type"];
    $address = $_POST["address"];
    // Insert data into the database if there are no errors

    if(empty($errors)) {
        $query = "INSERT INTO REEDEM (latitude, longitude, name, type, address ) VALUES ('$latitude', '$longitude', '$name', '$type', 'address')";
        $result = mysqli_query($conn, $query);

        if ($result) {
          // echo "Welcome to The Cure And Care.";
          // session_start();
          // $_SESSION['region'] = $region; // Assuming $region contains the region from the form
          // header('location: map.php');
        //   echo '<script>window.location.href = "map.php";</script>';
          exit;
        } else {
            echo "An error occurred while registering.";
        }
    }
}
?>