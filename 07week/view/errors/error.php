<!DOCTYPE html>
<html>
<head>
	<title>Error Page</title>
</head>
<body>
	<h1>An error has occurred</h1>
	<p>We're sorry, but an error has occurred while processing your request.</p>
	<p>Please try again later.</p>
	
	<?php
	if(isset($_GET['error'])) {
		$error_code = $_GET['error'];
		echo "<p>Error code: $error_code</p>";
	}
	?>
</body>
</html>