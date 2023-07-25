<?php
    session_start();
    include('connection.php');

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !is_numeric($username))
        {
            $query = "select * from users where username = '$username' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result)>0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['pass_word'] == $password){
                        header("location: taskpage.php");
                        die;
                    
                    }
                }
            }
            echo "<script type='text/javascript'> alert('Incorrect Username or Password')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Incorrect Username or Password')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Priority</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="loginRegFormContainer">
    <form method="post" id="loginRegFormContainer">
      <a class="backContainer" href="index.php">
        <div id="back1"class="back1" onclick="backButton1()" >
          <div class="circle"><svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
          </svg></div>
        </div></a>
        <h1>Login</h1>
        <div class="loginFormGroup">
             <label for="username">Username</label>
             <input type="text" id="userName" name="username" placeholder="Enter your username" required>
            </div>
        <div class="loginFormGroup">
             <label for="password">Password</label>
             <input type="password" id="userPassword" name="password" placeholder="Enter your password" required>
        </div>
        <div id="btn5Container"> <button class="button5" type="submit"><a href="homepage.php">Log In</button></div>
    </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>