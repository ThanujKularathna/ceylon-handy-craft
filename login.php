<?php
session_start();
include("database/connect.php");
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $entered_password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        $error_message = "Error executing the query: " . mysqli_error($conn);
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Verify the password
            if (password_verify($entered_password, $row['password'])) {
                $_SESSION['valid'] = $row['email'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['user_id'] = $row['user_id'];

                // Proceed with login
                header("Location: index.php");
                exit;
            } else {
                $error_message = "Wrong Username or Password";
            }
        } else {
            $error_message = "Wrong Username or Password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assests/css/logging.css">
</head>
<body>
    <div class="wrapper">
        <?php if (empty($error_message)) { ?>
            <div class="login">
                <h1 class="loging-text">Login</h1>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <input type="email" name="email" id="email" placeholder="E-mail">
                    <input type="password" name="password" id="password" placeholder="Password">
                    <p><a class="forget-password-container" href="">Forget Password?</a></p>
                    <button type="submit" name="submit">Log in</button>
                </form>
                <p class="divider">or</p>
                <div class="social-media">
                    <img class="socia-media-icon" src="assests/images/icons/google.png" alt="Google">
                    <img class="socia-media-icon" src="assests/images/icons/email.png" alt="E-mail">
                    <img class="socia-media-icon" src="assests/images/icons/facebook .png" alt="Facebook">
                </div>
                <p class="register-link">New Member ? <a href="createAccount.php">Register Here</a></p>
            </div>
        <?php } else { ?>
            <div class="error-container">
                <p class="error-message"><?php echo $error_message; ?></p>
                <a href="login.php"><button class="btn">Go Back</button></a>
            </div>
        <?php } ?>
        <div class="logo-container">
            <img src="assests/images/theme-images/bg-login.jpg" alt="">
        </div>
    </div>
</body>
</html>
