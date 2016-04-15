<?php 
require_once('../util/valid_admin.php');
include'../view/admin-header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <!-- display any errors -->
            <div class="error">
                <?php if(!empty($error)){
                    echo $error;
                } ?>
            </div>

            <!-- allow the administrator to add a category and price -->
                    <h2>Add Category</h2>
                    <form role="form" id="add_category_form"action="index.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="action" value="add_category" >
                            <label for="name">Category Name:</label>
                            <input type="text" class="form-control" name="name" ><br>
                            <label for="price">Category Price</label>
                            <input type="text" class="form-control" name="cat_catprice"><br>
                            <input type="submit" class="btn btn-default" value="Add Category">
                        </div>
                    </form>
        </div>
        <div class="col-sm-6">
            <!-- display the category list in a table format-->

            <div class="list-group">
                <h2>Packages</h2>
                <?php foreach ($categories as $category) : ?>
                <a href=".?category_id=<?php echo $category['cat_categoryID']; ?>"
                        class="list-group-item"><?php echo $category['cat_categoryName']; ?><br>
                    <?php echo $category['cat_price']; ?>
                </a>  
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_category" />
                    <input type="hidden" name="category_id" value="<?php echo $category['cat_categoryID']; ?>"/><br>
                    <input type="submit" class="btn btn-default" value="Delete"/>
                </form><br>            
                <?php endforeach; ?>
            </div>  
            <p>NOTE: You cannot delete a category with products in it.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Products</h2><p> in the <?php echo $category_name; ?> category are:</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Product Quantity</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Product Image Alt Text</th>
                            <th>&nbsp;</th> 
                        </tr>
                            <?php foreach ($products as $product) : ?>
                    </thead>
                    <tbody>
                        <tr>
                         <td><?php echo $product['prod_productID']; ?></td> 
                            <td><?php echo $product['prod_categoryID']; ?></td>
                            <td><?php echo $product['prod_prodCode']; ?></td>
                            <td><?php echo $product['prod_productQuantity']; ?></td>
                            <td><?php echo $product['prod_description']; ?></td>
                            <td><?php echo $product['prod_price']; ?></td>
                            <td><img src="<?php echo $product['imagepath']; ?>" alt="<?php echo $product['imagealt']; ?>"></td>
                            <td><?php echo $product['imagealt']; ?></td>
                            <td>
                                <form action="." method="post">
                                    <input type="hidden" name="action"
                                           value="delete_product">
                                    <input type="hidden" name="product_id"
                                           value="<?php echo $product['prod_productID']; ?>">
                                    <input type="hidden" name="category_id"
                                           value="<?php echo $product['prod_categoryID']; ?>">
                                    <input type="submit" class="btn btn-primary" value="Delete"> 
                                </form>
                            </td>
                        </tr>
                    </tbody>
                        <?php endforeach; ?>
                </table> 
            </div>
        </div>
    </div>           
</div>
<?php include'../view/footer.php'; ?>