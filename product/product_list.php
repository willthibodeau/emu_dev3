<?php 
if(isset($_SESSION['admin'])) { 
    require_once('../util/valid_admin.php');
    include'../view/admin_header.php';
}else if(!isset($_SESSION['admin'])){
  include'../view/header.php';  
}
?>

 <div class="contentWrapper"> 
    <!-- <div class="columnWrapper"> --> -->
        <main>
        <!-- main content goes here -->
            <article class="main" >
                <h2>Packages</h2><br>
                    <div class="productCategories">
                    
                        <ul class="menu"> 
                            <?php foreach ($categories as $category) : ?>
                            
                            <li><a href=".?category_id=<?php echo $category['cat_categoryID']; ?>"><?php echo $category['cat_categoryName']; ?><br><?php echo $category['cat_price']; ?></a>  
                            </li>
                                              
                            <?php endforeach; ?>
                        </ul> 
                        
                    
                    <h2><?php echo $category_name; ?> </h2>
                     </div>
                    <table class="productTable">
                        <thead>
                            <tr> 
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>  
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?php echo $product['prod_productQuantity']; ?></td>
                                <td><?php echo $product['prod_description']; ?></td>
                                <td><?php echo $product['prod_price']; ?></td>
                                <td ><img src="<?php echo $product['imagepath']; ?>" alt="<?php echo $product['imagealt']; ?>" class="productImage"></td>
                            </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table> 
            </article><!-- end main article -->
        </main>
        <!-- first sidebar goes here -->
       
  

   
</div><!-- end content wrapper -->



<div class="container">
  <div class="jumbotron">
    <h1>My First Bootstrap Page</h1>
    <p>Resize this responsive page to see the effect!</p> 
<i class="fa fa-search"></i>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <h3>Column 1</h3>

      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 3</h3>        
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
  <div class="row">
<p>this is some text</p>
    </div>
</div>

<?php include'../view/footer.php'; ?>