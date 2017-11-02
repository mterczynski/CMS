
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
    <script src="../libs/tether.js"></script>
    <!-- jQuery: -->
    <script src="../libs/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap: -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Font awesome: -->  
    <script src="../libs/fontAwesome.js"></script>
    <!-- Own styles: -->
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="./new.css">
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
                    <a class="nav-link" href="../">Articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../">My profile</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../register">
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
                        echo '<li class="nav-item"><a href="../server/logOut.php" class="nav-link logOutLink">Log out</a></li>';
                    }
                ?> 
            </ul>
        </div>
    </nav>

   <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Create article</h1>
            <p>
                <b>Note:</b> Article image is optional. If none provided, article will use default image. Article image must be <b>jpg</b>.
            </p>
        </div>
   </div>
   <div class="container">
        <form method="POST" enctype = "multipart/form-data" action="../server/addArticle.php">
            <div class="input-group">
                <input name="title" type="text" class="form-control" placeholder="Title" required>

                <div class="imageUpload">
                    <label for="imageInput">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                    </label>

                    <input name="image" id="imageInput" type="file" accept=".jpeg, .jpg"/>
                </div>

            </div>
            <textarea class="articleContent" placeholder="Some text..." name="content"></textarea>
            <input type="submit" class="btn btn-success btn-lg" href="#" role="button" value="Submit">
        </form>
   </div>
</body>

</html>