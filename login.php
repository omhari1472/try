<?php
session_start();
include('connection.php');
include('function.php');

// Check if the form is submitted
if (isset($_POST['login'])) {
    // Retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `signup` WHERE `email` = '$email' AND `password` = '$password'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        // $_SESSION['loggedIn'] = true;
        header('Location: index.html');

    } else {
        $msg = "wrong valid login details.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="login-section">
        <img class="design3" src="./assets/img/design3.png" alt="">
        <div class="loginimg">
            <img src="./assets/img/login.png" alt="">
            <h2>Welcome back to the <br>
                world of<br>
                <h1>
                    Green Revive!
                </h1>
            </h2>
        </div>

        <div class="logininput">
            <buttonclass="shadow">
                <img src="./assets/img/logo.png" alt="">
                </buttonclass=>
                <h2>Hello! Welcome Back</h2>
                <div class="parent-container">
                    <form method="POST" class="left-side">
                        <div class="row">
                            <label for="firstName">Email</label>
                            <input type="email" name="email" class="col-12  shadow" placeholder="example@gmail.com">
                        </div>
                        <div class="row">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="col-12 shadow" placeholder="   ********    ">
                        </div>
                        <div class="row checkbox">
                            <span>
                                <input type="checkbox" name="checkbox" required="">
                                <div class="text-element">Remember Me</div>
                            </span>
                            <a href="">Reset password!</a>
                        </div>
                        <div class="row">
                            <!-- <input type="submit" name="register" value="loin"> -->
                            <button class="cta-btn loginbutton" name="login" type="submit">Login</button>
                        </div>
                        <div id=msg>    
                        <?php echo $msg;?>
                        </div>
                        <div class="row checkbox">
                            <span>
                                <div class="text-element">Don't have an Account</div>
                            </span>
                            <a href="./signup.php">Create Account</a>
                        </div>
                    </form>
                </div>
        </div>
    </section>
</body>

</html>