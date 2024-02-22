<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/user_dashboard.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<title>Product Dashboard - User</title>
	</head>
	<body>
        <header>
			<h2 id="logo">V88 Merchandise</h2>
            <a href="<?= base_url('dashboard/user') ?>">Dashboard</a>
            <a href="<?= base_url('user/edit') ?>">Profile</a>
			<a href="/users">Log off</a>
		</header>
		<main>
            <h1 id="all_products">All products</h1>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Inventory Count</th>
                    <th>Quantity Sold</th>
                </tr>
<?php       foreach($products as $product)
            {   ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><a href="/products/show/<?= $product['id'] ?>"><?= $product['name'] ?></a></td>
                    <td><?= $product['inventory_count'] ?></td>
                    <td><?= $product['quantity_sold'] ?></td>
                </tr>
<?php       }   ?>
            </table>
		</main>
	</body>
</html>