<?php session_start();?>

<?php
include "config.php";


if(isset($_POST['but_submit'])){
    $email = trim($_POST['email']);
$password = trim($_POST['password_1']);

    if ($email != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where email='".$email."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            
                $_SESSION['email'] = $email;
                $_SESSION['user_logged_in'] = true;
            header('Location: index.php');
        }else{
            echo "Invalid email and password";
        }

    }

}

?>
<html>
    <head>
        <title>Login page</title>
        <style>/* Container */
.container{
    width:40%;
    margin:0 auto;
}

/* Login */
#div_login{
    border: 1px solid gray;
    border-radius: 3px;
    width: 470px;
    height: 270px;
    box-shadow: 0px 2px 2px 0px  gray;
    margin: 0 auto;
}

#div_login h1{
    margin-top: 0px;
    font-weight: normal;
    padding: 10px;
    background-color: cornflowerblue;
    color: white;
    font-family: sans-serif;
}

#div_login div{
    clear: both;
    margin-top: 10px;
    padding: 5px;
}

#div_login .textbox{
    width: 96%;
    padding: 7px;
}

#div_login input[type=submit]{
    padding: 7px;
    width: 100px;
    background-color: lightseagreen;
    border: 0px;
    color: white;
}

/* media */
@media screen and (max-width:720px){
    .container{
        width: 100%;
    }
    #div_login{
        width: 99%;
    }
}
</style>
    </head>
    <body>
        <div class="container">
            <form method="post" action="">
                <div id="div_login">
                    <h1>Login</h1>
                    <div>
                        <input type="text" class="textbox" id="email" name="email" placeholder="Email" />
                    </div>
                    <div>
                        <input type="password" class="textbox" id="password_1" name="password_1" placeholder="Password"/>
                    </div>
                    <div>
                        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>

