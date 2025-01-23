<?php
// Include the menu items or the source data
include('list.php');

// Check if the ID is passed in the query string
if (isset($_GET['id'])) {
    $dish_id = intval($_GET['id']); // Ensure the ID is an integer

    // Search for the dish in the menu_items array and remove it
    foreach ($menu_items as $key => $item) {
        if ($item['id'] == $dish_id) {
            // Remove the dish from the array
            unset($menu_items[$key]);
            break;
        }
    }

    // Re-index the array to avoid gaps in the keys
    $menu_items = array_values($menu_items);

    // Convert the updated $menu_items array back into a PHP code string
    $updated_menu_items = '<?php $menu_items = ' . var_export($menu_items, true) . '; ?>';

    // Save the updated array back into the list.php file
    file_put_contents('list.php', $updated_menu_items);

    // Redirect to the home page (or the menu page)
    header("Location: dashboard.php");  // Change this to the appropriate page if necessary
    exit();
} else {
    echo "No dish ID provided.";
    exit();
}
?>
