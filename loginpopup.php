
    <link href="css/loginpopup.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">

        function toggle_visibility(id) {
            var e = document.getElementById(id);
            if(e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';
        }

    </script>




    <div id="login-popup" class = "popup-position">
        <div id="popup-wrapper">
            <div id="popup-container">
                <div id="main">
                    <div id="login">
                        <h2>Login </h2>
                        <form action="login.php" method="post">
                            <label>UserName :</label>
                            <input id="name" name="username" placeholder="username" type="text">
                            <br>
                            <label>Password :</label>
                            <input id="password" name="password" placeholder="*********" type="password">
                            <br>
                            <input name="submit" type="submit" value=" Login ">
                            <span><?php echo $error; ?></span>
                        </form>
                    </div>
                </div>
                <div id="main2">
                    <div id="NewUser">
                        <h2>New User</h2>
                        <form action="createNewUser.php" method="post">
                            <label>UserName :</label>
                            <input id="name" name="username" placeholder="username" type="text">
                            <br>
                            <label>Password :</label>
                            <input id="password" name="password" placeholder="*********" type="password">
                            <br>
                            <label>Email :</label>
                            <input id="email" name="email" placeholder="email" type="text">
                            <br>
                            <input name="submit" type="submit" value=" Login ">
                            <br>
                            <span><?php echo $error; ?></span>
                        </form>
                    </div>

                </div>
                <p id = "close-button"><a href="javascript:void(0)" onclick="toggle_visibility('login-popup');">Close</a> </p>
            </div>
        </div>
    </div>

    <div id="wrapper">
        <p><a href="javascript:void(0)" onclick="toggle_visibility('login-popup');">Log In</a></p>
    </div>
