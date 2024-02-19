<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/register.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Register Page</title>
    </head>
    <body>
		<header>
			<h2>V88 Merchandise</h2>
			<a id="login" href="login">Login</a>
		</header>
		<main>
		<!-- Display error message if present -->
<?php   if (isset($error))
        {   ?>
            <p style="color: red"><?= $error ?></p>
<?php   }   ?>
        <!-- Display success message if present -->
<?php   	if (isset($success))
        {   ?>
            <p style="color: green"><?= $success ?></p>
<?php   }   ?>
        <div>
			<h3>Register</h3>
			<form action="/users/register" method="post">
                <input type="hidden" name="user_level" value="1">
                <label for="email">Email address: </label>
                <input type="text" name="email" placeholder="example@gmail.com">
				<label for="first_name">First name: </label>
                <input type="text" name="first_name" placeholder="First name">
				<label for="last_name">Last name: </label>
                <input type="text" name="last_name" placeholder="Last name">
				<label for="password">Password: </label>
                <input type="password" name="password" placeholder="atleast 8 characters">
                <label for="confirm_password">Confirm Password: </label>
                <input type="password" name="confirm_password" placeholder="********">
				<input type="submit" value="Login">
			</form>
			<a href="login">Already have an account? Login</a>
		</main>
	</body>
</html>