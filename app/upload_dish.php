<?php
include('list.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the form submission
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brief = $_POST['brief'];
    $ingredients = $_POST['ingredients'];
    
    // Handle image upload
    $upload_dir = 'images/';
    $upload_file = $upload_dir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) {
        $new_dish = [
            'id' => count($menu_items) + 1, 
            'name' => $name,
            'brief' => $brief,
            'ingredients' => $ingredients,
            'price' => $price,
            'image_url' => $upload_file
        ];

        // Append the new dish to the menu items array
        $menu_items[] = $new_dish;

        // Write the updated array back to menu_dishes.php
        file_put_contents('list.php', '<?php $menu_items = ' . var_export($menu_items, true) . '; ?>');

        echo "<div class='alert alert-success' role='alert'>New dish added successfully!</div>";
    }
    else {
        echo "<div class='alert alert-danger' role='alert'>Error uploading the image.</div>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload New Dish</title>

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
     body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: url('images/2.jpg') no-repeat center center fixed;
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
        }</style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="mb-4">Upload New Dish</h1>
        
        <!-- Form for uploading a new dish -->
        <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="label-name" for="name">Dish Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter dish name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price" class="form-control" placeholder="Enter dish price" required>
                </div>
            </div>

            <div class="form-group">
                <label for="brief">Brief Description</label>
                <textarea id="brief" name="brief" class="form-control" rows="4" placeholder="Enter brief description of the dish" required></textarea>
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredients</label>
                <textarea id="ingredients" name="ingredients" class="form-control" rows="4" placeholder="Enter ingredients" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Dish Image</label>
                <input type="file" id="image" name="image" class="form-control-file" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Dish</button>
        </form>

        <br>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <!-- Bootstrap JS and dependencies -->

</body>
</html>

