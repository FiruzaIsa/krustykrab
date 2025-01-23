<?php
include('list.php'); 


if (isset($_GET['id'])) {
    $dish_id = $_GET['id'];

    // Find the dish in the menu items array
    $dish = null;
    foreach ($menu_items as $item) {
        if ($item['id'] == $dish_id) {
            $dish = $item;
            break;
        }
    }

    if (!$dish) {
        echo "Dish not found.";
        exit;
    }
} else {
    // If no 'id' parameter is provided, show an error
    echo "No dish ID provided.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dish</title>
    <!-- Add Bootstrap for styling -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: url('images/1.jpg') no-repeat center center fixed;
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
            z-index: -1;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1>Edit Dish</h1>
    <!-- Edit form for the selected dish -->
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $dish['id'] ?>">

        <div class="form-group">
            <label for="name">Dish Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $dish['name'] ?>" required>
        </div>

        <div class="form-group">
            <label for="brief">Brief Description</label>
            <input type="text" class="form-control" id="brief" name="brief" value="<?= $dish['brief'] ?>" required>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required><?= $dish['ingredients'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?= $dish['price'] ?>" required>
        </div>

        <div class="form-group">
        <label for="image">Dish Image</label>
        <input type="file" class="form-control" id="image" name="image">
            
        </div>

        <button type="submit" class="btn btn-primary">Update Dish</button>
        
        
    </form>
    <br>
    <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
</div>


</body>
</html>
