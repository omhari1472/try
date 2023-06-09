<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="signup-section">
        <div class="signupinput">
            <h2>Register</h2>
            <h3>Create Your Account</h3>
            <div class="parent-container">
                <form action="#" method="POST" class="left-side">
                    <div class="row">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="col-12 shadow" placeholder="Username">
                    </div>
                    <div class="row">
                        <label for="firstName">Email</label>
                        <input type="email" name="email" class="col-12 shadow" placeholder="example@gmail.com">
                    </div>
                    <div class="row">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="col-12 shadow" placeholder="********">
                    </div>
                    <div class="row">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" name="confirmpassword" class="col-12 shadow" placeholder="********">
                    </div>
                    <div id="msg">
                        <?php echo $msg; ?>
                    </div>
                    <div class="row checkbox">
                        <span>
                            <div class="text-element">Already Have an Account?</div>
                        </span>
                        <a href="./login.php">Login</a>
                    </div>
                    <div class="row">
                    </div>
                    <input type="submit" name="signup" value="Register">
                    <!-- <button class="cta-btn loginbutton" name="register">Register</button> -->
                    <div class="or">
                        <hr> or <hr>
                    </div>
                    <button class="cta-btn loginbutton" name="googlelogin">Google Login</button>
                </form>
            </div>
        </div>
        <div class="signupimg">
            <img src="./assets/img/signup.png" alt="">
            <h2>Welcome back to the <br>
                world of<br>
                <h1>
                    Green Revive!
                </h1>
            </h2>
        </div>
    </section>

</body>

</html>
<?php
include("connection.php");
include("function.php");

$msg = ""; // Initialize the variable

if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

    // Perform validation

    $errors = [];

    if(empty($username)) {
        $errors['username'] = 'Username is required.';
    }

    if(empty($email)) {
        $errors['email'] = 'Email is required.';
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }

    if(empty($password)) {
        $errors['password'] = 'Password is required.';
    } elseif(strlen($password) < 6) {
        $errors['password'] = 'Password should be at least 6 characters long.';
    }

    if($password !== $confirmPassword) {
        $errors['confirmPassword'] = 'Passwords do not match.';
    }

    // Insert data into the database if there are no errors

    if(empty($errors)) {
        $query = "INSERT INTO signup (username, email, password) VALUES ('$username','$email', '$password')";
        $result = mysqli_query($conn, $query);

        if($result) {
            session_start();
            $_SESSION['IS_LOGIN'] = true;
            header('Location: index.html');
            exit;
        } else {
            $msg = "An error occurred while registering.";
        }
    }
}
?>
