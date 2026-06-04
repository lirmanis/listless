<?php require("Register/register.class.php") ?>
<?php
	if(isset($_POST['submit'])){
		$user = new RegisterUser($_POST['username'], $_POST['password']);
	}
?>

<?php require("Register/login.class.php") ?>
<?php 
	if(isset($_POST['submit'])){
		$user = new LoginUser($_POST['username'], $_POST['password']);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Register/style.css">
</head>
<body>

<div class="container">
    <h1> Listless</h1>
    <div class ="loginbox">

        <div class="logintxt">
            <p>Login to your account </p>
        </div>
            <div class="info">
            <form action="" enctype="multipart/form-data" class="form" method="post">
                <input class="usr" id="usr" type="text" name="username" placeholder="Email" required>
                <input class="usr" id="psw" type="password" name="password" placeholder="Enter Password" required>

                <button type="submit" name="submit" class="SubButton">Sign in or Login</button>

            </form> 

            <p class="output"><?php echo @$user->error ?></p>

        </div>
    </div>
</div>

</body>
</html>