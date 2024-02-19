<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/admin_dashboard.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<title>Product Dashboard - User</title>
	</head>
	<body>
		<header>
			<h1>V88 Merchandise</h1>
            <h2>Dashboard</h2>
            <h2>Profile</h2>
			<a href="/users">Log off</a>
		</header>
		<main>
            <h1>Manage products</h1>
            <a href="<?= base_url('products/new'); ?>" id="add_product">Add new</a>
            <!-- Display success message -->
<?php   if (isset($success))
        {   ?>
            <p class="success"><?= $success ?></p>
<?php   }   ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Inventory Count</th>
                    <th>Quantity Sold</th>
                    <th>Action</th>
                </tr>
<?php       foreach($products as $product)
                {   ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= $product['inventory_count'] ?></td>
                    <td><?= $product['quantity_sold'] ?></td>
                    <td>
                        <a id="edit-button" href="<?= base_url('products/edit/' .  $product['id']) ?>">Edit</a>  
                        <form action="<?= base_url('products/delete/' . $product['id']) ?>" method="post" style="display: inline">
                            <input id="delete-button" type="submit" name="delete" value="Remove">
                        </form>
                    </td>  
                </tr>
<?php           }   ?>
            </table>
		</main>
	</body>
</html>