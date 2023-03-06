<?php
require('model/database.php');
require('model/item_db.php');
require('model/category_db.php');

include "view/header.php";
include('view/item_list.php');
?>

<p><a href="view/add_item_form.php">Click here</a> to add a new item to the list.</p>
<a href="view/add_category.php">View/Edit Categories</a>

<?php
include "view/footer.php"
?>
</html>