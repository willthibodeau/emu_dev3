<?php
function get_categories() {
    global $db;
    $query = 
    ' SELECT * FROM categories
      ORDER BY cat_categoryID';          
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;     
}

function get_category_name($category_id) {
    global $db;
    $query = 
    ' SELECT * FROM categories
      WHERE cat_categoryID = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['cat_categoryName'];
    return $category_name;
}

function add_category($name, $price){
	global $db;
	$query = 
  ' INSERT INTO categories
      (cat_categoryID, cat_categoryName, cat_price)
    VALUES
      (null, :name, :cat_price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':cat_price', $price);
    $statement->execute();
    $statement->closeCursor();
}

function delete_category($category_id) {
    global $db;
    $query = 
    ' DELETE FROM categories 
      WHERE cat_categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

  function detect_category_name($name){
  	global $db;
  	$query = 
    ' SELECT cat_categoryName 
      FROM categories 
      WHERE cat_categoryName = :name'; 	
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
  	$statement->execute();
    $testValue = $statement->fetch();
    $statement->closeCursor();
    return $testValue;
}

// update category not working
function update_category($category_id, $category_name) {
    global $db;
    $query = 
    ' UPDATE categories 
      SET cat_categoryName = :category_name 
      WHERE cat_categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}

function get_first_row(){
  global $db;
  $query = 
  ' SELECT cat_categoryID
    FROM categories
    LIMIT 1';
  $statement = $db->prepare($query);
  $statement->execute();
  $categories = $statement->fetchAll();
  $statement->closeCursor();
  foreach($categories as $category){ 
  return $category['cat_categoryID'];
  }
}

?>