<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>How with PHP and MySQL create system of users registration and authorization</title>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container mlogin">
        <div id="login">
            <h1>Login</h1>
            <form action="" id="loginform" method="post" name="loginform">
                <p>
                    <label for="user_login">Username<br>
                        <input class="input" id="username" name="username" size="20" type="text" value="">
                    </label>
                </p>
                <p>
                    <label for="user_pass">Password<br>
                        <input class="input" id="password" name="password" size="20" type="password" value="">
                    </label>
                </p>
                <p class="submit">
                    <input class="button" name="login" type="submit" value="Log In">
                </p>
                <p class="regtext">
                    Not registered? <a href="register.php">Register</a>!
                </p>
            </form>
        </div>
    </div>
    <footer>
    </footer>
</body>

<?php
session_start();
?>

<?php
if (isset($_SESSION["session_username"])) {
    // Redirect if session is already set
    header("Location: intropage.php");
    exit();
}

if (isset($_POST["login"])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        
        // Використання $con для підключення до бази даних
        $query = mysqli_query($con, "SELECT * FROM usertbl WHERE username='" . $username . "' AND password='" . $password . "'");
        
        if (!$query) {
            die("Database query failed: " . mysqli_error($con));
        }

        $numrows = mysqli_num_rows($query);
        
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $dbusername = $row['username'];
                $dbpassword = $row['password'];
            }
            
            if ($username == $dbusername && $password == $dbpassword) {
                // Start session and redirect to intro page
                $_SESSION['session_username'] = $username;
                header("Location: intropage.php");
                exit();
            }
        } else {
            echo "<p class='error'>Invalid username or password!</p>";
        }
    } else {
        echo "<p class='error'>All fields are required!</p>";
    }
}
?>

<?php include("includes/footer.php"); ?>
