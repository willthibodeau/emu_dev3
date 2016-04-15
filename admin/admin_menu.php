<?php 
require_once('../util/valid_admin.php');
include'../view/admin-header.php';

?>
<div class="contentWrapper"> 
    

        <!-- main content goes here -->
        <article class="main">     
            <p>You are logged in as  an admin<?php echo $_SESSION['admin']; ?>.</p>
            <p>Error is:<?php if(!empty($error)) { echo $error; } ?>
            <p>Message is : <?php if(!empty($message)) { echo $message; } ?>
            <form action="" method="post">
                <input type="hidden" name="action" value="logout">
                <input type="submit" value="Logout">
            </form>
        </article><!-- end main article -->

        
</div><!-- end content wrapper -->

<?php include'../view/footer.php'; ?>