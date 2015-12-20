<?php
// Checking that the user is logged in, if not it will show the 'login' page.
include('session.php');
if($_SESSION['permLevel'] == 0){
    header('location: index.php');
}
// Displaying the logged in users information
$displayName = $_SESSION['displayName'];
$email = $_SESSION['email'];
$username = $_SESSION['login_user'];
$permLevel = $_SESSION['permLevel'];
$connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Settings Page</title>

    <!-- Bootstrap -->
    <link href="http://wbgroupc.azurewebsites.net/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://wbgroupc.azurewebsites.net/bootstrap-3.3.6-dist/css/extra.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
                    <!-- Navbar links-->
                    <li><a href="newAdventure.php">Upload</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="admin.php">Settings</a></li>
                    <li><a href="searchIndex.php">Search</a></li>
                </ul>
                <?php
                // Display user's information if they are logged in. 
                if($_SESSION['login_user']!= null){
                    $name = "Logged in as " . $_SESSION['displayName'];
                }
                ?>
                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <?php
                        if($_SESSION['login_user']!= null){
                            echo "<p id=logged-in>$name</p>";
                            ?>
                            <button type="button" class="btn btn-info"><a href="logout.php">Log Out</a></button>
                            <?php
                        }
                        else{

                            require_once("loginpopup.php");

                        }
                        ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <div>
                <!-- placeholder image, will be replaced by user -->
                <img src="http://placehold.it/150x150" style="max-width: 100%; max-height: 100%; display:block; margin:auto;" alt="ProfilePic"/>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <form action="updatesettings.php">
                <input type="submit" value="Update Profile Picture" style="display: block; margin: 0 auto">
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <p><h4><?php echo $displayName?></h4>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="border:1px solid #000;">
            <p><h4>Update Settings</h4>
            <form action="updateSettings.php" method="post">
                <h6>Display Name: </h6><input type="text" name="name" value="<?php echo $displayName;?>">
                <h6>Email: </h6><input type="text" name="email" value="<?php echo $email; ?>">
                <h6>Bio: </h6><input type="text" name="bio" placeholder="Please enter a bio">
                <input type="submit" value="submit">
            </form>
            <br>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<?php
// Show additional information if the user is an author or admin
if($permLevel > 2){
    genDivs();
}
?>

<?php
function genDivs(){

    $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
    $query = mysqli_query($connection,"SELECT username FROM users WHERE verified=0");
    $result = mysqli_num_rows($query);

    for ($i = 0; $i < $result; $i++) {
        $row = mysqli_fetch_array($query, MYSQLI_NUM);
        echo '<div class="container">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-1" style="border:1px solid #000;">
            <img src="http://placehold.it/60x60">
        </div>
        <div class="col-md-6" style="height: 62px; border:1px solid #000;">
            <form action="profile.php" method="get">
                <input type="submit" name="username" value="'.$row[0].'" />
            </form>
        </div>
        <div class="col-md-1" style="height: 62px; border:1px solid #000;">
        <form action="verifyUser.php" method="post">
            <input type="hidden" name="submit" value="submit"/>
            <input type="image" src="http://placehold.it/60x60?text=Verify+User" name="username" value="'.$row[0].'"/>
        </form>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>';
    }
}
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="http://wbgroupc.azurewebsites.net/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>

</html>
