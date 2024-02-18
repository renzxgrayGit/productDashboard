<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
	</head>
	<body>
		<header>
			<h1>V88 Merchandise</h1>
			<a href="/users/register">Register</a>
		</header>
		<main>
			<h3>Login</h3>
			<form action="/products/user_dashboard" method="post">
				<label for="email">Email address: </label>
				<input type="text">
				<label for="password">Password: </label>
				<input type="password">
				<input type="submit" value="Login">
			</form>
			<a href="/users/register">Don't have an account? Register</a>
		</main>
	</body>
</html>