<?php
$t_file=basename($_FILES['thefile']['name']);
if (move_uploaded_file($_FILES['thefile']['tmp_name'], $t_file)) {
	move_uploaded_file($_FILES['thefile']['tmp_name'], $t_file);
	echo "File '".$t_file."' uploaded successfully";
}else{
	echo "Something went wrong, try agains";
}
?>