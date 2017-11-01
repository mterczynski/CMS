<?php
    session_start();

    require('../server/connection.php');

    // Data validation:

    $is_valid = true;

    if(!isset($_POST["inputLogin"])){
        $is_valid = false;
    }
    if(!isset($_POST['inputPassword'])){
        $is_valid = false;
    }
    if(!isset($_REQUEST['subject'])){
        $is_valid = false;
    }

    if($is_valid){
        $login = $_POST["inputLogin"];
        $password = $_POST["inputPassword"];
        $subject = $_REQUEST['subject'];
        $passwordHash = hash('sha256', $password);

        if($subject == 'Login') {

            $query = "SELECT * FROM users WHERE login='$login' AND password='$passwordHash'";

            $connection = getNewConnection();

            $result = mysqli_query($connection, $query);
            $count = mysqli_num_rows($result);
            if($count > 0){
                $messageClass = "successMessage";
                $errorMessage = "Login success";
                header('Location: http://localhost/projekt_CMS');
                $_SESSION['user'] = $login;
            } else {
                $messageClass = "errorMessage";
                $errorMessage = "Login error: invalid username or password";
            }
            $connection->close();

        } else if($subject == 'Register') {

            $query = "INSERT INTO users(login, password, is_admin) VALUES('$login','$passwordHash','0')";

            $connection = getNewConnection();

            if($connection->query($query) === true) {
                $messageClass = "successMessage";
                $errorMessage = "Registration successfull, you can now log in.";
            } else {
                $messageClass = "errorMessage";
                $errorMessage = "Registration error, please try diffrent nickname.";
            }
            $connection->close();

        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS - rejestracja</title>

    <link href="./register.css" rel="stylesheet"></link>
</head>
<body>
    <form id="form1" method="POST" action="">
        <div class="mid" id="loginWindow" >
            <a href="../" class="goHomepage">
                <img src="../assets/home.png" alt="Homepage">
            </a>

            <input type="text" name = "inputLogin" id="login" placeholder="Login" class="textInput"/>
            <input type="password" name="inputPassword" placeholder="Password" class="textInput"/>
            <button name="subject" id="submit" class="formButton" value="Login">Login</button>
            <button name="subject" id="register" class="formButton registerButton" value="Register">Register</button>

            <span class="<?php if(isset($messageClass)) { echo $messageClass; } ?>">
                <?php if(isset($errorMessage)) { echo $errorMessage; }?>
            </span>
        </div>
    </form>
</body>
</html>

