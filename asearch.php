<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $advname ?></title>

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



    <title>Welcome to WanderBlog</title>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
</head>
<html><nav id="navbar">
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
                    <li><a href="newAdventure.php">Upload</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="admin.php">Settings</a></li>
                    <li><a href="searchIndex.php">Search</a></li>
                </ul>
                <?php
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
</html>
<?php
$localhost = "eu-cdbr-azure-west-c.cloudapp.net";
$username = "b0b05a48637b3e";
$password = "2d0628d7";
$database = "wb1306507";
$conn = new mysqli($localhost, $username, $password, $database);




if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$button = $_GET [ 'submit' ];
$search = $_GET [ 'search' ];

if( !$button ){
    echo "you didn't submit a keyword";
} else {
    if (strlen($search) <= 1) {
        echo "Search term too short";
    } else {

        $result = mysqli_query($conn, "SELECT * FROM adventures WHERE adventurename LIKE'%$search%' ORDER BY adventurename");

        if ($result->num_rows > 0) {
            echo '<table width="60%" border="1">';
            echo '<tr>';
            echo '<th>';
            echo "Aventure Name: " ;
            echo '</th>';
            echo '<th>';
            echo "Description: " ;
            echo '</th>';
            echo '<th>';
            echo "Location: " ;
            echo '</th>';
            echo '<th>';
            echo "Adventure Link: " ;
            echo '</th>';
            echo '</tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>';
                echo $row["adventurename"];
                echo '</td>';
                echo '<td>';
                echo $row["description"];
                echo '</td>';
                echo '<td>';
                echo $row["userid"] ;
                echo '</td>';
                echo '<td>';
                echo '<a href="http://wbgroupc.azurewebsites.net/adventure.php?adventureid=\<?=$$row["adventureid"]?>\&submit=Go+To+Adventure+Page\";
<src="http://maps.google<?=$city?>rest_of_the_link">
                echo \'</td>\';>Profile Link</a>';
                echo '</tr>';
            }
            echo '</table>';

        } else {
            echo "0 results";
        }
        $conn->close();
    }
}
?>