<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the item should be removed
    if (isset($_POST["remove"])) {
        // Get the item number from the form
        $itemNum = $_POST["remove"];
        // Delete the item from the database
        delete_item($itemNum);
		
		//delete_item($itemNum)
        // Redirect back to the index page
        header("Location: index.php");
        exit();
    }
}
	//Display the form for adding a new item
	$rows=get_categories();

	// If there are no items, display a message
	if (empty($rows)) 
	{
		echo "No categories exist!";
	}

	// If there are items, display them in a drop down list
	else {
		echo "<form method='get'>";
		echo "<label for='category_id'>Categories:</label>";
		echo "<select name='category_id' id='category_id'>";
		foreach ($rows as $row) {
			echo "<option value=" . $row["categoryID"] . ">" . $row["categoryName"] . "</option>";
		}
		echo "<option value=show_all selected='selected'>View All Categories</option>";
		echo "</select>";
		echo "<button type='submit'>Submit</button>";
		echo "</form>";
	}
if (isset($_GET["category_id"])) {
if ($_GET["category_id"]=="show_all")
	{
		$rows=get_all_items();
	}
else
	{
		$rows=get_items_by_category($_GET["category_id"]);
	}
}
else
{
	$rows=get_all_items();
}
//get_items_by_category($catID);


// If there are no items, display a message
if (empty($rows)) {
    echo "No to do list items exist yet.";
}

// If there are items, display them in a table
    echo "<table align='center' style='border: 1px solid black;'>";
    echo "<tr><th style='border: 1px solid black;'>ItemNum</th><th style='border: 1px solid black;'>Title</th><th style='border: 1px solid black;'>Description</th><th style='border: 1px solid black;'>Category</th><th style='border: 1px solid black;'>Remove</th></tr>";
    foreach ($rows as $row) {
        //echo "<tr><td style='border: 1px solid black;'>" . $row["ItemNum"] . "</td><td style='border: 1px solid black;'>" . $row["Title"] . "</td><td style='border: 1px solid black;'>" . $row["Description"] . "</td><td style='border: 1px solid black;'>" . $row["categoryID"] . "</td><td style='border: 1px solid black;'>";
        echo "<tr><td style='border: 1px solid black;'>" . $row["ItemNum"] . "</td><td style='border: 1px solid black;'>" . $row["Title"] . "</td><td style='border: 1px solid black;'>" . $row["Description"] . "</td><td style='border: 1px solid black;'>" . get_category_name($row["categoryID"]) . "</td><td style='border: 1px solid black;'>";
		// Add a Remove button beside each item
        echo "<form method='post'><button type='submit' name='remove' value='" . $row["ItemNum"] . "' style='color: red;'>X</button></form>";
        echo "</td></tr>";
    }
    echo "</table>";
	
	
	
	
?>