<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/assets/product_information.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
		<title>Product Information</title>
	</head>
	<body>
        <header>
			<h2 id="logo">V88 Merchandise</h2>
            <a href="<?= base_url('dashboard/user') ?>">Dashboard</a>
            <a href="<?= base_url('user/edit') ?>">Profile</a>
			<a href="/users">Log off</a>
		</header>
		<main>
            <h1><?= $products['name'] ?> ($ <?= $products['price'] ?>)</h1>
			<p>Added Since: <?= date('F jS Y', strtotime($products['created_at'])) ?></p>
			<p>Product ID: #<?= $products['id'] ?></p>
			<p>Description: <?= $products['description'] ?></p>
			<p>Total sold: <?= $products['quantity_sold'] ?></p>
			<p>Number of available stocks: <?= $products['inventory_count'] ?></p>

			<!-- Leave a Review Form -->
            <div class="leave-review">
                <h3>Leave a Review</h3>
                <form action="/reviews/show/<?= $products['id'] ?>" method="post">
                    <input type="hidden" name="action" value="create_review">
                    <textarea name="review" id="review" placeholder="Leave review..." cols="50" rows="5"></textarea>
                    <input type="submit" value="Post">
                </form>
            </div>

            <!-- Review Section -->
            <div class="reviews-section">
                <?php foreach($reviews as $review): ?>
                    <div class="review">
                        <p class="review-author"><?= $review['first_name'] ?> <?= $review['last_name'] ?> reviewed:</p>
                        <p class="review-date"><?= date('F jS Y', strtotime($review['created_at'])) ?></p>
                        <div class="review-content">
                            <p><?= $review['review'] ?></p>
                        </div>

                        <!-- Replies Section -->
                        <?php if(isset($replies[$review['id']])): ?>
                            <div class="replies">
                                <?php foreach($replies[$review['id']] as $reply): ?>
                                    <div class="reply">
                                        <p class="reply-author"><?= $reply['first_name'] ?> <?= $reply['last_name'] ?> replied:</p>
                                        <p class="reply-date"><?= date('F jS Y', strtotime($reply['created_at'])) ?></p>
                                        <div class="reply-content">
                                            <p><?= $reply['reply'] ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Reply Form -->
                        <div class="reply-form">
                            <form action="/reviews/show/<?= $products['id'] ?>" method="post">
                                <input type="hidden" name="action" value="create_reply">
                                <input type="hidden" name="review_id" value="<?= $review['id'] ?>">
                                <textarea name="reply" id="reply" placeholder="Leave reply..." cols="50" rows="5"></textarea>
                                <input type="submit" value="Reply">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
		</main>
	</body>
</html>