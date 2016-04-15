<?php 
include'../view/header.php';

?>
<div class="contentWrapper"> 
    <div class="columnWrapper">

        <!-- main content goes here -->
        <article class="main">
            <main>
            	<h2>Register</h2>
				<form action="." method="post" >
					<input type="hidden" name="action" value="register">
					<table>
						<tr><td>Username</td>
						<td><input type="text" required="required" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>" maxlength="60"></td>
						</tr>
					 	<tr><td>First Name</td>
						<td><input type="text" required="required" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></td>
						</tr>
						<tr><td>Last Name</td>
						<td><input type="text" required="required" name="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></td>
						</tr> 
						<tr><td>Password</td>
						<td><input type="password" required="required" name="password" value=""></td>
						</tr> 
					 	<tr><td>Confirm Password</td>
						<td><input type="password" required="required" name="password2" value=""></td>
						</tr>
						<tr><td>Email</td>
						<td><input type="text" required="required" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"></td>
						</tr>
						<tr><td>Phone</td>
						<td><input type="text" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>"></td>
					</table>
					<div>
						<input type="submit"  value="Register" >
					</div>
				</form>
				<p>Password should be between 8 and 20 characters; must contain at least one lowercase letter, one uppercase letter, one numeric digit, 
					and one special character, but cannot contain whitespace.</p>
				<p>Matches could include: 	
					Abc1234# | abcD$123 | A1b2&C3!</p>
				<p>Non-Matches would be like: abcd1234 | AbCd!@#$ | Abc 123#</p><br>
				<p>Email matches could be like: asmith@mactec.com | foo12@foo.edu | bob.smith@foo.tv</p><br>
				<div class="error">
					<?php if(!empty($error)) { echo $error; } ?>
				    <?php if(!empty($message)) { echo $message; } ?>
				</div>
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

<?php include'../view/footer.php'; ?>