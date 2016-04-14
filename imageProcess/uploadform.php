<?php 
require_once('../util/valid_admin.php');
include'../view/admin_header.php';
?>

<div class="contentWrapper"> 
    <div class="columnWrapper">
        <main>
            <article class="main">
        <h2>Image Manager</h2>
        
        
            <!-- main content goes here -->
            <!-- content is straight from the book file -->
            <h3>Please select an image to upload.</h3>
            <form id="upload_form"
                  action="." method="POST"
                  enctype="multipart/form-data">
                <input type="hidden" name="action" value="upload">
                <input type="file" name="file1"><br>
                <input id="upload_button" type="submit" value="Upload">
            </form>
            <h3>Images in the directory</h3>
            <?php if (count($files) == 0) : ?>
                <p>No images uploaded.</p>
            <?php else: ?>
                <ul>
                <?php foreach($files as $filename) :
                    $file_url = $image_dir . '/' .
                                $filename;
                    $delete_url = '.?action=delete&amp;filename=' .
                                  urlencode($filename);
                ?>
                    <li>
                        <a href="<?php echo $delete_url;?>">
                            <img src="delete.png" alt="Delete"></a>
                        <a href="<?php echo $file_url; ?>">
                            <?php echo $filename; ?></a>
                    </li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </main>

        <!-- first sidebar goes here -->
        <aside class="sidebar1">
          <h2>Sidebar 1</h2>
              <?php include '../view/admin_sidebar1.php'; ?>
        </aside><!-- end sidebar 1 -->
    </div><!-- end column wrapper -->

    <!-- second sidebar goes here -->
    <aside class="sidebar2">
        <h2>Google Ads</h2>
    </aside><!-- end sidebar 2 -->

</div><!-- end content wrapper -->

<?php include'../view/footer.php'; ?>