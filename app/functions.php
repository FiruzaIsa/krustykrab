<?php   
function get_dish_by_id($id) {
    global $menu_items;
    foreach ($menu_items as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return null; // Return null if not found
}
?>