<?php 
if($_SESSION['admin']=='Admin'){
include 'layout.php';

include 'footer.php';
	
	
	
}
else
{	
	echo '<meta http-equiv="refresh" content="0; url=login.php">';
}

?>


