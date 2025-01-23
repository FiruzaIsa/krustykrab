<?php
// Sample dishes data (replace this with a database in a real app)
include('list.php'); 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
 
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('images/wallpaper_spongebob.jpg') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            min-height: 100vh;
            color: white;
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
        h2{
            color:white;
        }
        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--primary-color);
            padding-top: 20px;
            color: white;
        }

        .sidebar a {
            padding: 12px 16px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        /* Page content styles */
        .content {
            margin-left: 260px;
            padding: 20px;
        }

        .admin-dashboard {
            margin-top: 20px;
        }

        .menu-item {
            display: flex;
            margin: 10px 0;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
        }

        .menu-item img {
            width: 100px;
            height: 100px;
            margin-right: 20px;
        }

        .menu-item h3 {
            margin: 0;
        }

        .button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 style="text-align: center; color: white;">Admin Panel</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="upload_dish.php">Add New Dish</a>
        <a href="#">Settings</a>
        <a href="logout.php">Log Out</a>
    </div>

    <!-- Content Area -->
    <div class="content">
        <h2>Welcome to the Admin Dashboard, <?php echo $_SESSION['username']; ?>!</h2>
        <div>
            <?php foreach ($menu_items as $item): ?>
                <div class="menu-item">
                    <img src="<?= $item['image_url'] ?>" alt="<?= $item['name'] ?>">
                    <div>
                        <h3><?= $item['name'] ?></h3>
                        <p><strong>Price:</strong> <?= $item['price'] ?></p>
                        <p><strong>Brief:</strong> <?= $item['brief'] ?></p>
                        <p><strong>Ingredients:</strong> <?= $item['ingredients'] ?></p>
                    </div>
                    <div>
                        <a href="edit_dish.php?id=<?= $item['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="delete.php?id=<?= $item['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this dish?')">Delete</a>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
