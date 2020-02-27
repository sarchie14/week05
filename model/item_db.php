<?php
function get_items_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM todoitems
              WHERE todoitems.categoryID = :category_id
              ORDER BY ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function get_item($item_num) {
    global $db;
    $query = 'SELECT * FROM todoitems
              WHERE ItemNum = :item_num';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_num', $item_num);
    $statement->execute();
    $item = $statement->fetch();
    $statement->closeCursor();
    return $item;
}

function delete_item($item_num) {
    global $db;
    $query = 'DELETE FROM todoitems
              WHERE ItemNum = :item_num';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_num', $item_num);
    $statement->execute();
    $statement->closeCursor();
}

function add_items($category_ID, $item_num, $title, $description) {
    global $db;
    $query = 'INSERT INTO todoitems
                (categoryID, ItemNum, Title, Description)
              VALUES
                (:category_ID, :item_num, :title, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_ID', $category_ID);
    $statement->bindValue(':item_num', $item_num);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':descr', $description);
    $statement->execute();
    $statement->closeCursor();
}
?>
