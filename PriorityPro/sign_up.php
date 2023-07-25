<?php
    session_start();
    include('connection.php');

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['confirmPassword'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            $query = "insert into users (username, email, pass_word, con_pass) values ('$username', '$email', '$password', '$c_password')";
            mysqli_query($con, $query);
            echo "<script type='text/javascript'> alert('Successfully')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Invalid')</script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Priority Pro</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="signUpRegFormContainer">
    <form method="post", id="signUpRegFormContainer">
    <a class="backContainer" href="index.php">
      <div id="back"class="back">
        <div class="circle"><svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
        </svg></div>
      </div></a>
    <h1>SIGN UP</h1>
    <p>Please fill in this form to create an account.</p>
    <div class="signFormGroup">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
        <span class="errorMessage" id="usernameError"></span>
      </div>
      <div class="signFormGroup">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        <span class="errorMessage" id="emailError"></span>
      </div>
      <div class="signFormGroup">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <span class="errorMessage" id="passwordError"></span>
      </div>
      <div class="signFormGroup">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
        <span class="errorMessage" id="confirmPasswordError"></span>
      </div>   
      <div id="btn4Container"><button class="button4" type="submit">Register</button></div>
    </form>
        </form>
    </div>
</body>
</html>