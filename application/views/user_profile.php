<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/user_profile.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Edit Profile - Admin</title>
    </head>
    <body>
        <header>
            <h2 id="logo">V88 Merchandise</h2>
            <a href="<?= base_url('dashboard/user') ?>">Dashboard</a>
            <a href="<?= base_url('user/edit') ?>">Profile</a>
            <a href="/users">Log off</a>
		</header>
        <main>
            <h1>Edit Profile</h1>
            <a id="return" href="<?= base_url('dashboard/user'); ?>">Return to Dashboard</a>
            <div class="form-container">
                <fieldset>
                    <!-- Display invalid message -->
<?php       if (isset($invalid))
                {   ?>
                    <p  class="error"><?= $invalid ?></p>
<?php           }   ?>
                    <!-- Display success message -->
<?php       if (isset($success))
                {   ?>
                    <p class="success"><?= $success ?></p>
<?php           }   ?>
                    <legend>Edit Information</legend>
                    <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post">
                        <input type="hidden" name="action" value="information">
                        <label for="email">Email address: </label>
                        <input type="text" name="email" value="<?= $user['email'] ?>">
                        <label for="first_name">First name: </label>
                        <input type="text" name="first_name" value="<?= $user['first_name'] ?>">
                        <label for="last_name">Last name: </label>
                        <input type="text" name="last_name" value="<?= $user['last_name'] ?>">
                        <input type="submit" name="save" value="Save">
                    </form>
                </fieldset>
                <fieldset>
                    <!-- Display invalid message -->
<?php       if (isset($invalid_password))
                {   ?>
                    <p  class="error"><?= $invalid_password ?></p>
<?php       }   ?>
                    <!-- Display success message -->
<?php       if (isset($success_password))
                {   ?>
                    <p class="success"><?= $success_password ?></p>
<?php           }   ?>
                    <legend>Change Password</legend>
                    <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post">
                        <input type="hidden" name="action" value="password">
                        <label for="old_password">Old password: </label>
                        <input type="password" name="old_password" >
                        <label for="new_password">New password: </label>
                        <input type="password" name="new_password" >
                        <label for="confirm_password">Confirm password: </label>
                        <input type="password" name="confirm_password" >
                        <input type="submit" name="save" value="Save">
                    </form>
                </fieldset>
            </div>
        </main>
    </body>
</html>