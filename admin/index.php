<?php
session_start();

require('../model/database_db.php');
require('../model/product_db.php');
require('../model/category_db.php');
require('../model/member_db.php');
require('../model/admin_db.php');

$action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
      $action = 'list_categories';
    }
 }


switch($action) {
 	case 'view_login':
 		include'../login/';
 		break;
 	case'list_categories':
 		$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);    
    if ($category_id == NULL || $category_id == FALSE) {
      $category_id = get_first_row();
    } 
    $categories = get_categories();
    $category_name = get_category_name($category_id);
    $products = get_products_by_category($category_id);
    $get_images = get_images();
    include('category_list.php');
    break;

 	case'add_category':
 		$name = filter_input(INPUT_POST, 'name');
 		$price = filter_input(INPUT_POST, 'cat_catprice');

    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);    
    if ($category_id == NULL || $category_id == FALSE) {
      $category_id = get_first_row();
    }
 		$categories = get_categories();
    $category_name = get_category_name($category_id);
    $products = get_products_by_category($category_id);

    //Validate inputs
    if ($name == NULL) {
      $error = "Name cannot be empty, Please check name and try again.";
      include'category_list.php';

    } else if ( $price == NULL) {
    	$error = "Price cannot be empty, Please check price and try again.";
      include'category_list.php';

    } else if(detect_category_name($name) == false){
      add_category($name, $price);
      header('Location: .?action=list_categories');  // display the Category List page
    
    } else {
      $error = 'name is already used';
      include'category_list.php';

    }
 	    break;

 	case'delete_category':
 		$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
 	  delete_category($category_id);
    header('Location: .?action=list_categories');      // display the Category List page
 	  break;

 	case'update_category':
 		$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    $category_name = filter_input(INPUT_POST, 'category_name');
    update_category($category_id, $category_name);
    header('Location: .?action=list_categories');
    break;

  case'list_products':
   	$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    
    if ($category_id == NULL || $category_id == FALSE) {
      $category_id = 1;
    }
    if ($product_id == NULl || $product_id == FALSE) {
      $product_id = 1;
    }
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $products = get_products_by_category($category_id);
    $imagepaths = get_imagepath($product_id);
    header('Location: .?action=list_categories');
    break;

 	case'delete_product':
 		$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);   
 	  $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            
    if ($category_id == NULL || $category_id == FALSE || $product_id == NULL || $product_id == FALSE) {    
      $error = "Missing or incorrect product id or category id.";
    } else { 
      delete_product($product_id);
      header("Location: .?category_id=$category_id");
    }
    break;

 	case'show_add_form':
 		$imagepaths = get_imagepath();
    $categories = get_categories();
    $get_images = get_images();
    include('product_add.php'); 
    break;

 	case'add_product':
 		$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);    
    $code = filter_input(INPUT_POST, 'code');
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');
    $price = filter_input(INPUT_POST, 'price');
    $imagePath = filter_input(INPUT_POST, 'imagePath');
    $imagealt = filter_input(INPUT_POST, 'imagealt');

    if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
            $name == NULL || $price == NULL || $price == FALSE) {
      $error = "Invalid product data. Check all fields and try again.";
      $categories = get_categories();
      header('Location: .?action=show_add_form');

  	} else { 
      add_product($category_id, $code, $name, $description, $price, $imagePath, $imagealt);
      header('Location: .?action=list_categories'); 
    }
    break;

 	case'view_comments':
 		$comments = comment_data();
 		include'comment_menu.php';
 		break;

 	case'delete_comment':
 		$comment_id = filter_input(INPUT_POST, 'comment_id', FILTER_VALIDATE_INT);
 		delete_comments($comment_id);
 		header('Location: .?action=view_comments');
 	  break;

 	case'add_comment':
 		$com_userid = 2;
 		$comment_text = filter_input(INPUT_POST, 'comment_text');
 		add_comments($com_userid, $comment_text);
 		header('Location: .?action=view_comments');
 	  break;

  case'search':
    $name = filter_input(INPUT_POST, 'search_names');
    $ids = find_userID_by_name($name);
    if(!empty($ids)){
      $comment_text = search_comments($ids);
      include'search_results.php';
    } else {
      $message = $name . " Name is not in the database";
      include'search_results.php';
    }
    break;

 	case'logout':
 		unset($_SESSION['admin']);
    header('Location: ../../index.php');
    break;

  default:
 		$error =  'Unknown Admin action: ' . $action;
 		include'../errors/error.php';	
		break;
 }
