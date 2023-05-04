<link rel="icon" href="images/logo.png">
<?php
session_start();
if(isset($_SESSION['email']))
{
    header("location: index.php");
    exit;
}
require_once "database.php";
$email = $password = "";
$err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter email + password";
    }
    else{
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    }
if(empty($err))
{
    $sql = "SELECT username,email, password,password2 FROM signup WHERE email =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_email);
    $param_email = $email;
    if(mysqli_stmt_execute($stmt))
    {
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
            {
            mysqli_stmt_bind_result($stmt,$username,$email, $password,$password2);
                if(mysqli_stmt_fetch($stmt))
                {
                    if($password===$_POST["password"])
                        {     
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["loggedin"] = true;
                            header("location: index.php");
                        }
                    }   }
                }
            }    
        }
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub</title>
    <link rel="icon" href="logo.jpg">
    <link rel="stylesheet" href="signup.css">
</head>

<body>

    <body>
        <div class="container">
            <form id="form"  method="post">
                <h1>Login</h1>
                <div class="input-control">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text">
                    <div class="error"></div>
                </div>
                <div class="input-control">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password">
                    <div class="error"></div>
                </div>
                <button type="submit" name="login">Login</button>
                <Div class="register">
                    Don't have a account!
                    <a href="signup.html"> Register</a>
                </Div>
            </form>
        </div>
    </body>

</html>