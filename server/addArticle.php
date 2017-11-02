<?php
session_start();
require_once("./connection.php");

$connection = getNewConnection();

if (isset($_POST['title']) && isset($_POST['content'])) {
    
    $image;
    $base64;
    if(isset($_FILES['image'])){
        $base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
    } else {
        $base64 = 'NULL';      
    }
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $userId = $_SESSION['userId'];

    $query = "INSERT INTO articles(`user_id`, `title`, `text`, `when_created`, `when_modified`, `image`) VALUES ($userId, '$title', '$content', NOW(), NOW(), '$base64')";
    if (!mysqli_query($connection, $query)) { // Error handling
        echo "Something went wrong! :("; 
    }
    header('Location: http://localhost/projekt_CMS');
}

?>