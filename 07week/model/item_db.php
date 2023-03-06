<?php
//reference pdf 187
function get_all_items()
{
	global $db;
	$query = "SELECT * FROM todoitems ORDER BY ItemNum";
	$query = $db->prepare($query);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function get_items_by_category($category_id)
{
	global $db;
	$query = "SELECT * FROM todoitems
				WHERE todoitems.categoryID = '$category_id'
				ORDER BY ItemNum";
	$query = $db->prepare($query);
	$query->execute();
	$rows = $query->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function get_item($item_num) {
	global $db;
	$query = "SELECT * FROM todoitems
				WHERE ItemNum = '$item_num'";
	$item = $db->query($query);
	$item = $item->fetch();
	return $item;
}
function delete_item($item_num) {
	global $db;
    $query = "DELETE FROM todoitems WHERE ItemNum = :itemNum";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':itemNum', $item_num);
    $stmt->execute();
}
function add_item ($category_id, $item_title, $item_description) {
	global $db;
	$query = "INSERT INTO todoitems
				(categoryID, Title, Description)
				VALUES
				('$category_id', '$item_title', '$item_description')";
				$db->exec($query);
}
?>
