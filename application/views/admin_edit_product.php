<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/admin_edit_product.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>Edit Product - Admin</title>
    </head>
    <body>
        <header>
            <h2 id="logo">V88 Merchandise</h2>
            <a href="<?= base_url('dashboard/admin') ?>">Dashboard</a>
            <a href="<?= base_url('user/edit') ?>">Profile</a>
			<a href="/users">Log off</a>
        </header>
        <main>
            <h1>Edit product #<?= $product['id'] ?></h1>
            <a id="return" href="<?= base_url('dashboard/admin') ?>">Return to Dashboard</a>
            <!-- Display invalid message -->
<?php   if (isset($invalid))    
        {   ?>
            <p class="invalid"><?= $invalid ?></p>
<?php   }   ?>
            <!-- Display success message if present -->
<?php   if (isset($success))
        {   ?>
            <p class="success"><?= $success ?></p>
<?php   }   ?>
            <form action="<?= base_url('products/update/' . $product['id']) ?>" method="post">
                <label for="name">Name: </label>    
                <input type="text" name="name" value="<?= $product['name'] ?>">
                <label for="description">Description: </label>
                <input type="text" name="description" value="<?= $product['description'] ?>">
                <label for="price">Price: </label>
                <input type="text" name="price" value="<?= $product['price'] ?>">
                <label for="inventory_count">Inventory Count: </label>
                <input type="number" id="inventory_count" name="inventory_count" min="1" max="999" value="<?= $product['inventory_count'] ?>">
                <input type="submit" name="save" value="Save">
            </form>
        </main>
    </body>
</html>