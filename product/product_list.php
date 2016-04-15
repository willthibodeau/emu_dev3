<?php 
if(isset($_SESSION['admin'])) { 
    require_once('../util/valid_admin.php');
    include'../view/admin-header.php';
}else if(!isset($_SESSION['admin'])){
  include'../view/header.php';  
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 ">    
                
    </div>
  </div><!-- end row -->
  <div class="row"> 
            
      <div class="col-sm-3 col-md-3 col-lg-4 " > 
        <div class="list-group">
        <h2>Packages</h2>
         
          <?php foreach ($categories as $category) : ?>
          
            <a href=".?category_id=<?php echo $category['cat_categoryID']; ?>"
                class="list-group-item"><?php echo $category['cat_categoryName']; ?><br>
              <?php echo $category['cat_price']; ?>
            </a>  
                          
          <?php endforeach; ?>
         
      </div>
    </div>
    <div class="col-sm-9 col-md-9 col-lg-8">
      <div class="list-group"> 
        <h2><?php echo $category_name; ?> </h2>
          <div class="table-responsive">  
            <table class="table  table-striped">
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
          </div>
         
        </div><!-- end list group -->
      </div><!-- end col -->
    </div><!-- end container fluid     -->
  </div>
</div>
<p> https://almsaeedstudio.com/blog/10-Free-Responsive-Bootstrap-Templates-For-2016</p>
<?php include'../view/footer.php'; ?>