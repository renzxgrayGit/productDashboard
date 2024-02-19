<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="/assets/login.css">
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<title>Login Page</title>
	</head>
	<body>
		<header>
			<h2>V88 Merchandise</h2>
			<a id="register" href="register">Register</a>
		</header>
		<main>
			<!-- Display error message if present -->
<?php   if (isset($error))
        {   ?>
            <p style="color: red"><?= $error ?></p>
<?php   }   ?>
			<h3>Login</h3>
			<form action="/users/login" method="post">
				<label for="email">Email address: </label>
				<input type="text" name="email" placeholder="example@gmail.com">
				<label for="password">Password: </label>
				<input type="password" name="password" placeholder="password">
				<input type="submit" value="Login">
			</form>
			<a href="register">Don't have an account? Register</a>
		</main>
	</body>
</html>