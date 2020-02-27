<?php
require('./model/database.php');
require('./model/item_db.php');
require('./model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_items';
    }
}

if ($action == 'list_items') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $items = get_items_by_category($category_id);
    include('item_list.php');
} else if ($action == 'delete_item') {
    $item_num = filter_input(INPUT_POST, 'item_num', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $item_num == NULL || $item_num == FALSE) {
        $error = "Missing or incorrect Item Num or category id.";
        include('./errors/error.php');
    } else { 
        delete_item($item_num);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'delete_category') {
    $item_num = filter_input(INPUT_POST, 'item_num', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $item_num == NULL || $item_num == FALSE) {
        $error = "Missing or incorrect Item Num or category id.";
        include('./errors/error.php');
    } else { 
        delete_category($category_id);
        header("Location: .?category_id=$category_id");
    } 
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('add_item_form.php');    
} else if ($action == 'add_item') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $item_num = filter_input(INPUT_POST, 'item_num');
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description', FILTER_VALIDATE_FLOAT);
    if ($category_id == NULL || $category_id == FALSE || $item_num == NULL || 
            $title == NULL || $description == NULL) {
        $error = "Invalid item data. Check all fields and try again.";
        include('./errors/error.php');
    } else { 
        add_items($category_id, $item_num, $title, $description);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'add_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $category_name = filter_input(INPUT_POST, 'categoryName');
    if ($category_id == NULL || $category_id == FALSE || $category_name == NULL) {
        $error = "Invalid item data. Check all fields and try again.";
        include('./errors/error.php');
    } else { 
        add_category($category_id, $category_name);
        header("Location: .?category_id=$category_id");
    }
}   
































