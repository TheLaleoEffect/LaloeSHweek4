<?php
session_start();

function test_input($checks){
    foreach ($checks as $check){
        $data = trim($check);
        $data = stripslashes($data);
        $check = htmlspecialchars($data);
    }

    return $checks;
}

if (isset($_POST['login'])){
    $errors = [];
    if (empty($_POST['username'])){
        $errors[] = "username is required";
    }
    if (empty($_POST['password'])){
        $errors[] = "password is required";
    }

    if ($_POST['username'] != $_SESSION['username'])
    if ($_POST['password'] != $_SESSION['password']){
        $errors[] = "wrong credentials";
    }

    if (count($errors) === 0){
        header('Location: '. "dashboard.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="bg">
  <header class="head">
  <h1>Laleo's Hub<br>
  LOGIN</h1>
     </header>

     <main>
      <p>WELCOME! you have successfully registered, kindly create your login details.</p>
      <h2>Please Fill The Form Below
        </h2>
    <form method="post">
      <p class="ask">* required field</p>
    
    <label>Username:</label>
      <input type="text" name="username" required > <span style="color: red;">*</span><br><br>
    <label>Password:</label>
      <input type="password" name="password" required > <span style="color: red;">*</span><br><br>
    
       <input type="checkbox"><caption>Always remind me</caption><br>
<button class="btn" name="login">LOGIN</button>
</form>
      </main>
      <footer>
        <h3>You have created your login profile!</h3>
        <h4>HAPPY SHOPPING :)</h4>
      </footer>
  </div>
</body>
</html>