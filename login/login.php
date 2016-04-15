<?php include '../view/header.php'; ?>

      

<div class="container">
  <h2>Login Page</h2>
  <div class="row">
    <div class="col-sm-5 col-md-3 col-lg-5 " >
      <form role="form" action="." method="post">
        <input type="hidden" name="action" value="login">

        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" name="username"  placeholder="Please enter a username" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
        </div>
        
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
        </div>
      
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <div class="error">
        <?php if(!empty($error)) { echo $error; } ?>
        <?php if(!empty($message)) { echo $message; } ?>
      </div> 
    </div>
  </div>
</div>


        <p>Abc1234#</p>

         
 
<?php include '../view/footer.php'; ?>