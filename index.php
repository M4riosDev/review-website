<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reviews Website </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="page">
    <header class="site-header">
        <div class="site-title"> Reviews</div>
        <nav class="nav-links">
            <a href="admin.php">Admin</a>
            <a href="view.php">Reviews</a>
        </nav>
    </header>

    <div class="card form-card">
        <h2>Submit Review</h2>

        <form action="upload.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Order NO</label>
        <input type="text" name="order_no" required>
    </div>

    <div class="form-group">
        <label>Comment</label>
        <textarea name="comment"></textarea>
    </div>

    <div class="form-group">
        <label>Stars</label>
        <div class="stars-rating">
            <input type="radio" name="stars" id="star5" value="5"><label for="star5">★</label>
            <input type="radio" name="stars" id="star4" value="4" checked><label for="star4">★</label>
            <input type="radio" name="stars" id="star3" value="3"><label for="star3">★</label>
            <input type="radio" name="stars" id="star2" value="2"><label for="star2">★</label>
            <input type="radio" name="stars" id="star1" value="1"><label for="star1">★</label>
        </div>
    </div>

    <div class="form-group">
        <label>Upload Photo</label>
        <input type="file" name="photo" accept="image/*">
    </div>

    <button type="submit">Send review</button>
</form>

    </div>
</div>
</body>
</html>

