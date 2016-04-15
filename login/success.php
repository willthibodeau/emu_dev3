<?php 
include'../view/header.php'; 
?>
<div class="contentWrapper"> 
    <div class="columnWrapper">

        <!-- main content goes here -->
        <article class="main">
            <main>
                <h2>Success.php</h2>
                <p>Thank you for registering. Your information is:</p>
                <p>Username:<?php echo $userName; ?></p>
                <p>First Name:<?php echo $firstName; ?></p>
                <p>Last Name: <?php echo $lastName; ?></p>
                <p>Email Address : <?php echo $email; ?></p>
                <p>Phone: <?php echo $phone; ?></p>
                <a href="login.php"><button>Login</button></a>
            </main>
        </article><!-- end main article -->

        <!-- first sidebar goes here -->
	    <aside class="sidebar1">
	      <h2>Sidebar 1</h2>
	          
	    </aside><!-- end sidebar 1 -->
	</div><!-- end column wrapper -->

    <!-- second sidebar goes here -->
    <aside class="sidebar2">
        <h2>Google Ads</h2>
    </aside><!-- end sidebar 2 -->
</div><!-- end content wrapper -->

<?php include '../view/footer.php'; ?>