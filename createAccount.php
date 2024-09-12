<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assests/css/create-account.css">
</head>

<body>
    <div class="container">
        <div class="content-wrapper">
               
            <div class="logo-container">
                <img src="assests/images/theme-images/bg-login.jpg" alt="Ceylon Handicraft Logo">
            </div>
            <div class="form-container">

                <?php
                include("database/connect.php");
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    $first_name = filter_input(INPUT_POST,"first_name",FILTER_SANITIZE_SPECIAL_CHARS);
                    $last_name = filter_input(INPUT_POST,"last_name",FILTER_SANITIZE_SPECIAL_CHARS);
                    $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
                    $password = $_POST['password'];
                    $re_password = $_POST['re_password'];

                    $verify_query = mysqli_query($conn, "SELECT Email FROM users WHERE Email='$email'");

                    if ($password != $re_password) {
                        echo "<div class='message'>
                                <p>Passwords do not match</p>
                            </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    }

                    if (mysqli_num_rows($verify_query) != 0) {
                        echo "<div class='message'>
                                <p>This email is used, Try another One Please!</p>
                            </div> <br>";
                        echo "<a class='go-back' href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {
                        mysqli_query($conn, "INSERT INTO users(first_name, last_name, email, Password) VALUES('$first_name', '$last_name', '$email', '$hashed_password')");
                        echo "<div class='message'>
                                <p>Registration Successfully!</p>
                            </div> <br>";
                        echo "<a class='login-now' href='login.php'><button class='btn'>Login Now</button>";
                    }
                } else {
                ?>
                    <h2>Create Account</h2>
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                        <div class="input-group">
                            <input type="text" name="first_name" placeholder="First Name" required autocomplete="off">
                            <input type="text" name="last_name" placeholder="Last Name" required autocomplete="off">
                        </div>
                        <div class="input-group">
                            <input type="email" name="email" placeholder="Email" required autocomplete="off">
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" placeholder="Password" required autocomplete="off">
                            <input type="password" name="re_password" placeholder="Re enter Password" required autocomplete="off">
                        </div>
                        <button type="submit" class="submit-btn" name="submit" >sign up</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>