<?php
function get_categories() {
	global $db;
	$query = 'SELECT * FROM categories ORDER BY categoryID';
	$stmt = $db->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

function get_category_name($category_id) {
	global $db;
	
	$query = "SELECT categoryName FROM categories WHERE categoryID = ?";
	$stmt = $db->prepare($query);
	$stmt->execute([$category_id]);
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($rows as $row) {
	return $row["categoryName"];}
}

function check_category_exists($category_name){
	global $db;
	$query = "SELECT categoryID FROM categories WHERE categoryName = ?";
	$stmt = $db->prepare($query);
	$stmt->execute([$category_name]);
	$records = $stmt->fetchAll();
	return $records;
}

function delete_category($categoryID) {
	global $db;
	$query = "DELETE FROM categories WHERE categoryID = :categoryID";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':categoryID', $categoryID);
    $stmt->execute();
}

function add_category($catName) {
	global $db;
	$query = "INSERT INTO categories (categoryName) VALUES (:category)";
	$stmt = $db->prepare($query);
	$stmt->bindValue(':category', $catName);
	$stmt->execute();
}

?>