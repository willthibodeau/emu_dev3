<?php 
include'../view/header.php';
?>
<div class="contentWrapper"> 
   

        <!-- main content goes here -->
        <article class="main">
			<h2>Login error</h2>
			<?php 
				if(!empty($error)){
					echo $error; 
				}else{
					echo'Return to home.';
				}
			?>
        </article><!-- end main article -->

<?php include'../view/footer.php'; ?>