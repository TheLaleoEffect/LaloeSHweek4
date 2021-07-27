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
 if (isset($_POST['dashboard'])){
    $errors = [];
    if (empty($_POST['password'])){
        $errors[] = "Password is required";
    }
    if ($_POST['password'] != $_SESSION['password']){
        $errors[] = "wrong password";
    }
    if (count($errors) === 0){
        header('Location: '. "index.html");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>DASHBOARD</title>
  <link rel="stylesheet" type="text/css" href="dashboard.css">
</head>
<body >
  <div class="bg">
  <header class="head">
  <h1>Laleo's Hub<br>
  DASHBOARD</h1>
     </header>

     <main>

      <h2>Welcome <?php echo $_SESSION['firstname'] . " " . $_SESSION['surname']?></h2>
         <h2>Your Username is: <?php echo $_SESSION['username']?></h2>
<label>Input password:</label>
      <input type="password" name="password" required >     
      </main>update reset delete post 
      <footer>
        <button class="btn" name="shop">Start Shopping</button>
        <button class="btn" name="shop">Update</button>
        <button class="btn" name="shop">Reset password</button>
        <button class="btn" name="shop">Post</button>
        <button class="btn" name="shop">Delete post</button>
        <h3>Thanks for chosing Laleo's Hub!</h3>
      </footer>
      </div>
</body>
</html>
