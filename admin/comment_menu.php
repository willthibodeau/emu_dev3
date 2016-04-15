<?php 
require_once('../util/valid_admin.php');
include'../view/admin-header.php';
?>

<div class="contentWrapper"> 
    
		<main>
	        <!-- main content goes here -->
	        <article class="main">

		        <!-- Administrator can search/view and insert comments -->
				<h3>Search Comments by User Name</h3>
				<form action="" method="post">
					<input type="hidden" name="action" value="search">
					<input type="text" name="search_names" value=" " placeholder="search">
					<input type="submit" value="Search">
				</form>
				<h3>View comments menu:</h3>
				<table>
					<tr>
						<th>User Name</th>		
						<th>Comment</th>
						<th>&nbsp;</th>
					</tr>
						<?php foreach($comments as $comment=>$value) : ?>
					<tr>
						<td>
							<?php echo $value['users_firstName']; ?>
						</td>
						<td>
							<?php echo $value['com_commentText']; ?>
						</td>
						<td> 
		 					<form action="" method="post">
                                <input type="hidden" name="action" value="delete_comment" />
                                <input type="hidden" name="comment_id" value="<?php echo $value['com_commentID']; ?>">
                                <input type="submit" value="Delete "/>
                           	</form>
						</td>
					</tr>
						<?php endforeach; ?>  
				</table>  
				
				<h2>Add Comments</h2>
		        <form action="." method="post">
		            <input type="hidden" name="action" value="add_comment">
		            <input type="hidden" name="com_userid" value="2">
		            <textarea  rows="5" cols="50" name="comment_text" placeholder="Add Comments..."></textarea><br> 
		            <input type="submit" value="Submit Comments">
		        </form>	    		
	        </article><!-- end main article -->
		</main>


</div><!-- end content wrapper -->

<?php include'../view/footer.php'; ?>