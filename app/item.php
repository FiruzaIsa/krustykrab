<?php  
include('list.php'); 
include('functions.php');
$dish_id = isset($_GET['id']) ? $_GET['id'] : null;

// Retrieve the dish by ID using the helper function
$dish = get_dish_by_id($dish_id);

if (!$dish) {
    echo "Dish not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Details</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: url('images/krusty.jpg') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            min-height: 100vh;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }
        .card-item{
           max-width: 600px;
           text-align: center;
           margin: 20px auto;
           background: #fff;
           padding: 20px;
           border-radius: 10px;
           box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- <div class="dish-details">
        <img src="<?= $dish['image_url'] ?>" alt="<?= $dish['name'] ?>" width="150">
        <div>
            <h3>Description</h3>
            <p><?= $dish['description'] ?></p>
            <h3>Ingredients</h3>
            <p><?= $dish['ingredients'] ?></p>
            <h3>Price</h3>
            <p><?= $dish['price'] ?></p>
        </div>
    </div> -->

    <!-- <a href="index.php" class="back-link">Back to Menu</a> -->
    <div class="container" role="main" style="margin:0; background:none;">
        <!-- Image Section -->
    <div class="card-item">
        <div class="image-section">
            <img id="item-image" src="<?= $dish['image_url'] ?>"  alt="<?= $dish['name'] ?>">
        </div>

        <!-- Details Section -->
        <div class="details-section">
            <h2 id="item-name"><?= $dish['name'] ?></h2>
            <p id="item-description"><?= $dish['brief'] ?></p>
            <p id="item-description"><?= $dish['ingredients'] ?></p>
        </div>

        <!-- Back Button -->
        <a class = "btn btn-primary" href="index.php">Back to Menu</a>
     </div>
    </div>

   

</body>
</html>