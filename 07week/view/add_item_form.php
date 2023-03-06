<?php
require('../model/database.php');
require('../model/item_db.php');
require('../model/category_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$itemCategory = $_POST["categorySelect"];
	$itemTitle = $_POST["itemTitle"];
	$itemDescription = $_POST["itemDescription"];
	
	
	if((isset($itemCategory))&&(isset($itemTitle))&&(isset($itemDescription)))
	{
		add_item($itemCategory,$itemTitle,$itemDescription);
	} 
}
?>
<html>
<body>
<?php include "header.php" ?>

<h2>Add Item</h2>

<form method="post">
    <label for="itemTitle">Title:</label>
    <input type="text" name="itemTitle" id="itemTitle"><br>
    <label for="itemDescription">Description:</label>
    <input type="text" name="itemDescription" id="itemDescription"><br>
<?php
	//Display the form for adding a new item
	$rows=get_categories();

	// If there are no items, display a message
	if (empty($rows)) 
	{
		echo "No categories exist!";
	}

	// If there are items, display them in a drop down list
	else {
		echo "<label for='categorySelect'>Categories:</label>";
		echo "<select name='categorySelect' id='categorySelect'>";
		foreach ($rows as $row) {
			echo "<option value=" . $row["categoryID"] . ">" . $row["categoryName"] . "</option>";
		}
		echo "</select>";
	}

?>
</select><br>
    <button type="submit">Add Item</button>
</form>

<a href=../index.php>View To Do List</a>

<?php

// Close the database connection
$conn = null;
include "footer.php"
?>
</body>
</html>