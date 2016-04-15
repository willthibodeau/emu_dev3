<?php 
require_once('../util/valid_member.php');

include'../view/member-header.php';
?>

<div class="contentWrapper"> 
    <div class="columnWrapper">

        <!-- main content goes here -->
        <article class="main">
            <main>
				<h2>Member Login is Successful!</h2>
				<p>You are logged in as <?php echo $_SESSION['member_userName']; ?>.</p>
				<p>Welcome  <?php echo $_SESSION['member_firstName']; ?>.</p>  



				<p>Go to the Member Management <a href="../member/index.php">Page</a></p>
				
			</main>
        </article><!-- end main article -->

        <!-- first sidebar goes here -->
	    <aside class="sidebar1">
	      <h2>Sidebar 1</h2>
	          
	    </aside><!-- end sidebar 1 -->
	</div><!-- end column wrapper -->

    <!-- second sidebar goes here -->
    <aside class="sidebar2">
        <h2>Sidebar 2 </h2>
        <p>comments / testimonials</p>
    </aside><!-- end sidebar 2 -->
</div><!-- end content wrapper -->

<?php include'../view/footer.php'; ?>