<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS</title>

    <!-- Tether: -->
    <script src="libs/tether.js"></script>
    <!-- jQuery: -->
    <script src="libs/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap: -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Font awesome: -->  
    <script src="libs/fontAwesome.js"></script>
    <!-- Own styles: -->
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->

        <div class="navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My profile</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="register">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php
                            if(isset($_SESSION['user'])) { 
                                echo $_SESSION['user']; 
                            } else {
                                echo 'Log in / register'; 
                            }
                        ?>
                    </a>
                </li> 
                <?php
                    if(isset($_SESSION['user'])) { 
                        echo '<li class="nav-item"><a href="server/logOut.php" class="nav-link logOutLink">Log out</a></li>';
                    } else {

                    }
                ?> 
            </ul>
        </div>
    </nav>

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Articles</h1>
            <p>
                Here you can display list of articles. You can also add your own article.<br>
                <?php
                    if(!isset($_SESSION['user'])) { 
                        echo '<b>You need to be logged in to add an article.</b>';
                    } 
                ?>      
            </p>
            <?php
                if(isset($_SESSION['user'])) { 
                    echo '<a class="btn btn-success btn-lg" href="./new" role="button">Create article</a>';
                } 
            ?> 
        </div>
    </div>
    
    <div class="container">
        <!-- SELECT and show articles -->
        <?php
            require_once('./server/connection.php');
            $query = 'SELECT articles.*, users.login FROM articles, users WHERE articles.user_id = users.id ORDER BY articles.id DESC';
            $connection = getNewConnection();
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result))
            {
                
                echo 
                "<div class='article'>";
                // edit, delete icons:
                if(isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == $row['login']){
                    echo '<img class="deleteIcon" alt="" src="assets/icon_x.png">
                    <img src="assets/pencil.png" class="editIcon" alt="">';
                }
                // image:
                if($row['image'] != null){
                    echo '<img class="img_article" src="data:image/jpeg;base64,'.$row['image'].'" alt=""/>';
                }
                echo 
                    '<div class="article__author">Author: <b>'.$row['login']."</b>, ".$row['when_created']."</div>";
                echo
                    "<h1>".$row['title']."</h1>"
                    ."<div class='articleText'>".$row['text']."</div>"
                ."</div>";
            }
        ?>
    </div>  
</body>

</html>