<?php		
include "header.php";
require('../model/database.php');
require('../model/item_db.php');
require('../model/category_db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["remove"])) {
        $categoryID = $_POST["remove"];
        delete_category($categoryID);
        header("Location: add_category.php");
        exit();
    }
    else 
	{
		$catName = $_POST["catName"];
		if(isset($catName))
		{
			$check = check_category_exists($catName);			
			if ($check) 
			{
				echo "<script>alert('This Category already exists. Please choose another category name.')</script>";
			} 
			else 
			{
			add_category($catName);
			}
		} 
	}
}
		
$rows=get_categories();

// If there are no items, display a message
if (empty($rows)) {
    echo "No to do list items exist yet.";
}

// If there are items, display them in a table
else {
    echo "<table align='center' style='border: 1px solid black;'>";
    echo "<tr><th style='border: 1px solid black;'>Name</th><th style='border: 1px solid black;'>Remove</th></tr>";
    foreach ($rows as $row) {
        echo "<tr><td style='border: 1px solid black;'>" . $row["categoryName"] . "</td><td style='border: 1px solid black;'>";
        // Add a Remove button beside each item
        echo "<form method='post'><button type='submit' name='remove' value='" . $row["categoryID"] . "' style='color: red;'>X</button></form>";
        echo "</td></tr>";
    }
    echo "</table>";
}
?>

<h3>Add Category</h3>
<form method="post">
    <label for="catName">Name:</label>
    <input type="text" name="catName" id="catName">
    <button type="submit">Add Item</button>
</form>

<a href="../index.php">List Products</a>

</body>
</html>

<?php
include "footer.php"
?>