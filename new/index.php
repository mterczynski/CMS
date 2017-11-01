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

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
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
                <b>Note:</b> article image is optional. If none provided, article will use default image.
            </p>
        </div>
   </div>
   <div class="container">
        <form>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Title">
                <div class="titleRow">
                    <!-- <input type="file">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                    </input> -->
                    <div class="imageUpload">
                        <label for="imageInput">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </label>

                        <input id="imageInput" type="file"/>
                    </div>
                </div>
            </div>
            <textarea class="articleContent" placeholder="Some text..."></textarea>
            <a class="btn btn-success btn-lg" href="#" role="button">Submit</a></p>
        </form>
   </div>
</body>

</html>