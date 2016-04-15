<?php 
require_once('../util/valid_admin.php');
include'view/admin-header.php';
?>

				<h2>Administrator Login is Successful!</h2>
				<p>You are logged in as <?php echo $_SESSION['admin_firstName']; ?>.</p>
				<p>Go to the Administrators Management <a href="../admin/index.php">Page</a></p>	
			

<?php include'../view/footer.php'; ?>
  