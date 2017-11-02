<?php
    // if(isset($_POST['delete'])){
        require_once('connection.php');

        $articleId = $_POST['articleId'];
        $connection = getNewConnection();
        $query = "DELETE FROM articles WHERE id=$articleId";

        if($connection->query($query) === true) {
            echo 'Article deleted';
            header('Location: http://localhost/projekt_CMS');
        } else {
            echo 'Error: Cannot delete this article';
        }
        $connection->close();
    // }
?>