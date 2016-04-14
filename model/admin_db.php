<?php
function is_valid_admin_login($username, $password) {
    global $db;
    $password = sha1($username . $password);
    $query = 
    '   SELECT * FROM users
        WHERE users_username = :username 
        AND users_password = :password 
        AND users_userLevel = "a"';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    if ($statement->rowCount() == 1) {
        $valid = 1;
    } else {
        $valid = 0;
    }
    $statement->closeCursor();
    return $valid; 
}

function is_valid_member_login($userName, $password) {
    global $db;
    $password = sha1($userName . $password);
    $query = 
    '   SELECT * FROM users
        WHERE users_username = :username 
        AND users_password = :password 
        AND users_userLevel = "m"';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $userName);
    $statement->bindValue(':password', $password);
    $statement->execute();
    if ($statement->rowCount() == 1) {
        $valid = 1;
    } else {
        $valid = 0;
    }
    $statement->closeCursor();
    return $valid; 
}

function get_users($userName) {
    global $db;
    $query = 
    '   SELECT COUNT(*) FROM users 
        WHERE users_username = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $userName);
    $statement->execute();
    $admin = $statement->fetch();
    $user_count = $admin[0];
    $statement->closeCursor();
    if ($user_count > 0 ) {
        return true;
    } else {
        return false;
    }
}

function get_comment() {
    global $db;
    $query = 
    '   SELECT * FROM comments';          
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function delete_comments($comment_id) {
    global $db;
    $query = 
    '       DELETE  FROM comments 
            WHERE com_commentID = :comment_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':comment_id', $comment_id);
    $statement->execute();
    $statement->closeCursor();
}

function find_userID_by_name($name){
    global $db;
    $query = 
    "   SELECT users_userID
        FROM users 
        WHERE users_username = '$name'";
    $statement = $db->prepare($query);
    $statement->execute();
    $id = $statement->fetchAll();
    $statement->closeCursor();
    foreach($id as $key=>$value){ 
        return$value[0];
    }
}
    
function search_comments($id) {
    global $db;
    $query = 
    '   SELECT com_commentText 
        FROM comments
        WHERE com_userID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $comment_text = $statement->fetchAll();
    $statement->closeCursor();
    return $comment_text;
}

function get_user_info($userName){
    global $db;
    $query = 
    '   SELECT * FROM users 
        WHERE users_username = :users_username';
    $statement = $db->prepare($query);
    $statement->bindValue(':users_username', $userName);
    $statement->execute();    
    $users_firstName = $statement->fetchAll();
    $statement->closeCursor();    
    return $users_firstName;
}

function comment_data() {
    global $db;
    $query = 
    '   SELECT users.users_firstName, comments.com_commentText, comments.com_commentID 
        FROM users 
        INNER JOIN comments 
        ON users.users_userID = comments.com_userID 
        ORDER BY users.users_userID ';
    $statement = $db->prepare($query);
    $statement->execute();
    $data = $statement->fetchAll();
    $statement->closeCursor();
    return $data;
}

?>