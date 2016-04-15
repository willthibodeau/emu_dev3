<?php 
require_once('../util/valid_admin.php');
include'../view/admin-header.php';
?>
<div class="contentWrapper"> 

        <!-- main content goes here -->
        <article class="main">
            <main>

            <!-- Allow the administrator to add products -->
            <h2>Add Products</h2>
                <form action="." method="post" class="formInput">
                    <input type="hidden" name="action" value="add_product">
                    <label>Package Name:</label>
                <select name="category_id">
                    <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['cat_categoryID']; ?>"><?php echo $category['cat_categoryName']; ?>
                    </option> 
                    <?php endforeach; ?>
                </select><br>
                    <label>Product Code:</label>
                    <input type="text" name="code" ><br>

                    <label>Product Quantity:</label>
                    <input type="text" name="name" ><br>

                    <label>Product Description:</label>
                    <input type="text" name="description" ><br>

                    <label>Product Price:</label>
                    <input type="text" name="price" ><br>
                
                    <label>Product Image:</label>
                    <select name="imagePath">
                        <?php foreach( $get_images as $get_image) : ?>
                        <option value="<?php echo $get_image ; ?>"><?php echo $get_image; ?>
                        </option>
                        <?php endforeach; ?>
                    </select><br>

                    <label>Product Image Alt Text:</label>
                    <input type="text" name="imagealt" ><br>

                  
                    <input type="submit" value="Add Product" /><br>
                </form>
             
                <div class="error">
                  <?php if(!empty($error)) { echo $error; } ?>
                </div> 
             
                <p><a href="?action=list_products">View Product List</a></p>
            </main>
        </article><!-- end main article -->

    </div><!-- end content wrapper -->
<?php include '../view/footer.php'; ?>