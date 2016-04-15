<?php 
	if (isset($_SESSION['admin']) || isset($_SESSION['member'])) {
        include'../view/admin-header.php';
    }

?>