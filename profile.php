<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    // Redirect the user to the login page or display an error message
    header('Location: login.php'); // Replace "login.php" with your actual login page URL
    exit;
}

// Assuming you have a database connection, fetch the username based on the logged-in user's credentials
$username = "";


// Check the connection
if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

// Fetch the username based on the logged-in user's credentials
$userID = $_SESSION['userID']; // Assuming the user ID is stored in the session after successful login

$sql = "SELECT username FROM SIGNUP WHERE id = '$userID'";
$result = $connection->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username'];
}

// Close the database connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Revive</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="home.css">

  
</head>
<body>
 
 <section id="header">

    <!-- <a href=""><img src="logo.png"  width ="55px"   alt="logo"></a>
    <div>
        <ul id ="navbar">
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About us</a></li>
          <li><a href="services.html">Services</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="contact.html">Contact</a></li>
         
        </ul>
    </div> -->

    <nav class="navbar navbar-expand-lg"  style="background-color:#a3f2ac;">
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
              <a class="nav-link active" aria-current="page" href="index.html">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reward.html">Redwards</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            <li class="nav-item">
            <img class="profileimg" src="./assets/img/profileimg.png" alt="">
            <form>
        <label for="username">Name:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly>
            </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      
    
    
 </section>
 <section id="hero"> 
  <h2>Smarter</h2>
  <h4>Solution for a Cleaner</h4>
  <h2>World</h2>
  <p>There is no such thing as ‘away’. 
    <br>When we throw anything away <br> it must go somewhere.</p>
  <button type="button" class="btn btn-success">Contact</button> 
 </section>







</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src ="script.js"></script>


</html>