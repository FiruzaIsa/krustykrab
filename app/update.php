<?php
// Include the menu items or source data
include('list.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data to prevent XSS and other issues
    $id = intval($_POST['id']); // Make sure it's an integer
    $name = htmlspecialchars($_POST['name']);
    $brief = htmlspecialchars($_POST['brief']);
    $ingredients = htmlspecialchars($_POST['ingredients']);
    $price = htmlspecialchars($_POST['price']);
    $image_url = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Define the upload directory
        $uploadDir = 'images/'; 
        $fileName = basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $fileName;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $image_url = $targetFile; // Set the image URL
        } else {
            // Handle upload error (e.g., file move failure)
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
     }else {
        foreach ($menu_items as $item) {
            if ($item['id'] == $id) {
                $image_url = $item['image_url']; // Retain the existing image URL
                break;
            }
        }
        }
    // Update the dish in the menu_items array
    foreach ($menu_items as &$item) {
        if ($item['id'] == $id) {
            $item['name'] = $name;
            $item['brief'] = $brief;
            $item['ingredients'] = $ingredients;
            $item['price'] = $price;
            $item['image_url'] = $image_url;
            if ($image_url) {
                $item['image_url'] = $image_url; // Update only if a new image was uploaded
            }
            break;
        }
    }

    $updated_menu_items = '<?php $menu_items = ' . var_export($menu_items, true) . '; ?>';
    file_put_contents('list.php', $updated_menu_items);

    // Redirect to the dashboard page
    header("Location: dashboard.php");
    exit();  
}
?>
