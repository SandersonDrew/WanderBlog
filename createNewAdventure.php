
<?php
include('session.php');
if (isset($_POST['submit'])) {
    if (empty($_POST['Text']) || empty($_POST['Location'])) {
        $error = "Texts or Location is empty";
        echo $error;
    } else {
        // Define values

        $name = $_POST['advname'];
        $text = $_POST['Text'];
        $location = $_POST['Location'];
        $date = $_POST['date'];
        $userid = $_SESSION['userid'];
        $target_dir = getcwd()."/photos/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $uploadOk = 1;
        // Establishing Connection with Server
        $connection = new mysqli("eu-cdbr-azure-west-c.cloudapp.net", "b0b05a48637b3e", "2d0628d7", "wb1306507");
        // To protect MySQL injection for Security purpose
        $text = stripslashes($text);
        $location = stripslashes($location);

        // SQL query to insert new user details into database and log them in
        mysqli_query($connection, "INSERT INTO adventures(userid,description,location,adventurename,advdate) VALUES($userid,'$text','$location','$name','$date') ");

// Check if image file is a actual image or fake image]
            $check = getimagesize($_POST["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo $target_file;
                echo $target_dir;
                echo " ";
                echo $imageFileType;
                echo " ";
                echo "File is not an imagez.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, files already exists.";
            $uploadOk = 0;
        }
// Check fil
// Allow certain file formats
        if($imageFileType != "jpg" || $imageFileType || "png" && $imageFileType || "jpeg"
            || $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            $connection->close(); // Closing Connection
            if (move_uploaded_file($_POST["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_POST["fileToUpload"]["name"]). " has been uploaded.".$target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
