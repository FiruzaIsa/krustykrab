
<?php
// Sample menu items array
include('list.php'); 
$page = $_GET['page'] ?? 'index'; // Default to 'home' if no parameter is provided

// Define the mapping of pages to their corresponding files
$valid_pages = [
    'tentacles-admin-dashboard' => 'dashboard.php',
    'burger' => 'item.php',
    'home' => 'index.php',
    'create' => 'upload_dish.php',
    
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Menu Layout | Crusty Crab</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: url('images/bob.jpg') no-repeat center center fixed;
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
        .container {
            width: 80%;
            margin: 20px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            padding: 10px;
        }
        .card img {
            width: 100%;
            height: 200px;
            border-bottom: 1px solid #ccc;
            margin-bottom: 10px;
        }
        .card .brief {
            font-size: 14px;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 480px) {
            .container {
                grid-template-columns: 1fr;
            }
        }
        header h1 {
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>
     <header>
        <h1>Welcome to Crusty Crab</h1>
    </header>
    <main class="container" role="list">
    <?php foreach ($menu_items as $item): ?>
            <div class="card" data-id="<?= $item['id']; ?>" role="listitem" >
                <img src="<?= $item['image_url']; ?>" alt="Image of <?= $item['name']; ?>" loading="lazy">
                <p class="brief"><?= $item['brief']; ?></p>
                <a href="item.php?id=<?= $item['id'] ?>" class="btn btn-primary">Details</a>
            </div>
        <?php endforeach; ?>
    </main>



</body>
</html>
