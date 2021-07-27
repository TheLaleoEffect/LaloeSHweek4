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
if (isset($_POST['register'])){
    $errors = [];
    if (empty($_POST['firstname'])){
        $errors[] = "first Name is required";
    }
    if(empty($_POST['surname'])){
        $errors[] = "Surname is required";
    }
    if (empty($_POST['username'])){
        $errors[] = "username is required";
    }
    if (empty($_POST['email'])){
        $errors[] = "Email is required";
    }
    if (empty($_POST['password'])){
        $errors[] = "password is required";
    }
    if (empty($_POST['confirm'])){
        $errors[] = "Re type your password again";
    }
    if (empty($_POST['phonenum'])){
        $errors[] = "phone number is required";
    }

    if ($_POST['password'] != $_POST['confirm']){
        $errors[] = "Password mis-match";
    }

    if(count($errors) === 0){
        unset($_POST['confirm'], $_POST['register']);
       $_POST = test_input($_POST);

//       load information to session
        $_SESSION['firstname'] = $_POST['firstname'];
        $_SESSION['surname'] = $_POST['surname'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['phoneNumber'] = $_POST['phonenum'];
        $_SESSION['password'] = $_POST['password'];

        header('Location: '. "login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>REGISTRATION</title>
  <link rel="stylesheet" type="text/css" href="register.css">
</head>
<body >
  <div class="bg">
  <header class="head">
  <h1>Laleo's Hub<br>
  REGISTRATION</h1>
     </header>

     <main>
         <?php if (isset($errors) && count($errors) > 0): ?>
             <?php foreach ($errors as $error): ?>
                <p><?php print_r($errors)  ?></p>
            <?php endforeach; ?>
         <?php endif; ?>
      <h2>Kindly Fill The Form Below
        </h2>
    <form method="post">
      <p class="ask">* required field</p>
    <label>First Name:</label>  
      <input type="text" name="firstname" required > <span style="color: red;">*</span><br><br>
      <label>Surname:</label>  
      <input type="text" name="surname" required > <span style="color: red;">*</span><br><br>
    <label>Username:</label>
      <input type="text" name="username" required > <span style="color: red;">*</span><br><br>
   <label>Email:</label>
     <input type="text" name="email" placeholder="myemail@gmail.com" required > <span style="color: red;">*</span><br><br>
        <label>Password:</label>
        <input type="password" name="password" placeholder="enter password" required > <span style="color: red;">*</span><br><br>
        <label>Confirm Password:</label>
        <input type="password" name="confirm" placeholder="retype your password" required > <span style="color: red;">*</span><br><br>
  <label>Phone Number</label>
  <input type="number" name="phonenum" required > <span style="color: red;">*</span><br>

  <input type="checkbox" required><caption>I agree to have filled up this form correctly</caption><br>
<button class="btn" type="submit" name="register">Register</button>

</form>
      </main>
      <footer>
        <h3>Thanks for registering with us!</h3>
      </footer>
      </div>
</body>
</html>