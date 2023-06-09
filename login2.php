<?php
include('connection.php');
include('function.php');
session_start(); // Start the session

// Check if the user is already logged in
// if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
//     // Redirect the user to the home page or any authenticated section
//     header('Location: home.php'); // Replace "home.php" with the desired page after login
//     exit;
// }

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check the connection
    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }

    // Prepare the SQL query to fetch the user from the signup table
    $sql = "SELECT id, email, password FROM signup WHERE email = ?";
    $statement = $connection->prepare($sql);
    $statement->bind_param('s', $email);
    $statement->execute();
    $statement->store_result();

    // Check if a user with the given email exists
    if ($statement->num_rows > 0) {
        $statement->bind_result($userID, $fetchedEmail, $hashedPassword);
        $statement->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, set the session variables and redirect the user
            $_SESSION['loggedIn'] = true;
            $_SESSION['userID'] = $userID;
            $_SESSION['email'] = $fetchedEmail;

            // Redirect the user to the home page or any authenticated section
            header('Location: profile.php'); // Replace "profile.php" with the desired page after login
            exit;
        }
    }

    // Close the database connection
    $statement->close();
    $connection->close();

    // Login failed, display an error message
    $msg = 'Invalid email or password';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            <button class="shadow">
                <img src="./assets/img/logo.png" alt="">
            </button>
            <h2>Hello! Welcome Back</h2>
            <div class="parent-container">
                <form method="POST" class="left-side">
                    <div class="row">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="col-12 shadow" placeholder="example@gmail.com">
                    </div>
                    <div class="row">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="col-12 shadow" placeholder="   ********    ">
                    </div>
                    <div class="row checkbox">
                        <span>
                            <input type="checkbox" name="checkbox" required>
                            <div class="text-element">Remember Me</div>
                        </span>
                        <a href="">Reset password!</a>
                    </div>
                    <div class="row">
                        <button class="cta-btn loginbutton" name="login" type="submit">Login</button>
                    </div>
                    <div id="msg">
                        <?php echo $msg; ?>
                    </div>
                    <div class="row checkbox">
                        <span>
                            <div class="text-element">Don't have an Account</div>
                        </span>
                        <a href="">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
