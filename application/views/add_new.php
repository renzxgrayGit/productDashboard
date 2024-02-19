<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/add_new.css">
        <title>New Product - Admin</title>
    </head>
    <body>
        <header>
            <h1>V88 Merchandise</h1>
            <h2>Dashboard</h2>
            <h2>Profile</h2>
            <a href="/users">Log off</a>
        </header>
        <main>
            <h1>Add new product</h1>
            <a href="<?= base_url('dashboard/admin'); ?>">Return to Dashboard</a>
            <!-- Display invalid message -->
<?php   if (isset($invalid))
        {   ?>
            <p  class="error"><?= $invalid ?></p>
<?php   }   ?>
            <!-- Display success message -->
<?php   if (isset($success))
        {   ?>
            <p class="success"><?= $success ?></p>
<?php   }   ?>
            <form action="/products/create" method="post">
                <label for="name">Name: </label>    
                <input type="text" name="name" placeholder="Name">
                <label for="description">Description: </label>
                <input type="text" name="description" placeholder="Description">
                <label for="price">Price: </label>
                <input type="text" name="price" placeholder="Price">
                <label for="inventory_count">Inventory Count: </label>
                <input type="number" id="inventory_count" name="inventory_count" min="1" max="999" value="1">
                <input type="submit" name="create" value="Create">
            </form>
        </main>
    </body>
</html>