
<html>
<head>
    <title> My search engine </title>
</head>
<body>
<nav id="navbar">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img id="sitelogo" src="/Photos/logoback.png" height="50" width="90" alt="Logo" ></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">Upload</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="admin.php">Settings</a></li>
                    <li><a href="newAdventure.php">Create New Adventure</a></li>
                </ul>
                <?php
                if($_SESSION['login_user']!= null){
                    $name = "Logged in as " . $_SESSION['displayName'];

                }
                ?>
                <ul id = "name" class="nav navbar-nav navbar-right">

                    <li id="name"><?php if($_SESSION['login_user']!= null){
                            echo $name;
                        }
                        else{require_once("loginpopup.php");}
                        ?></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</nav>

<form action = 'search.php' method = 'GET' >
<center >
<h1> My Search Engine </h1 >
<input type = 'text' size='90' name = 'search' >
</br>
</br>
<input type = 'submit' name = 'submit' value = 'Search source code' >
<option> 10 </option >
<option> 20 </option >
<option> 50 </option >
</center >
</form >
</body >
</html >


