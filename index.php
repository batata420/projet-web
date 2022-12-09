<?php
    require("config.php");
    session_start();
    if(isset($_POST['email']) && isset($_POST['password']))
    {
        if(!empty($_POST['email']) and !empty($_POST['password']) )
        {
            $query = "SELECT * FROM inscription WHERE email = :mail AND mdp = :mdp";  
            $db = config::getConnexion();
            $statement = $db->prepare($query);  
            $statement->execute(  
                 array(  
                      'mail'     =>     $_POST["email"],  
                      'mdp'     =>     $_POST["password"]  
                 )  
            );  
            $count = $statement->rowCount();  
            if($count > 0)  
                {  
                 $_SESSION["mail"] = $_POST["email"];
                 $_SESSION["type"] = 'admin';
                 if($_SESSION['type']=='admin')
                 {
                    header("location: backoffice.php"); 
                 }
                 else
                 {
                    header("location: catalogues.php"); 
                 }
                  
                }  
            }
        else  
        {  
                echo '<label>Wrong Data</label>';  
        }
    }   
?>

<html lang="en">
<head>
    <title>9oFty.tn</title>
    <link rel="shortcut icon" href="chariot.png">
    <link rel="stylesheet" href="index.css">
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">9oFty.tn</h2>
            </div>
            <div class="menu">
                <ul> 
                    <li><a href="catalogues.html" >PRODUITS</a></li>
                    <li><a href="#footer" >CONTACT</a></li>
                    <li><a href="index.php" >LOGIN</a></li>
                    <li><a href="account.php" >REGISTER</a></li>
                </ul>
            </div>

            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <button class="btn">Search</button></a>
            </div>

        </div> 
        <div class="content">
            <h1>Quick & <br><span>Fast</span> <br>Shopping</h1>
            <p class="par">fastest and easiest way of getting your groceries done  ,9oFty will simulate for you <br> the feeling 
                of shopping in a real store.
                <br> all products acquired from this website are guaranteed to be in excellent condition, <br>  we will gladly reimburse our customers otherwise. </p>

                <button class="cn"><a href="catalogues.html">Start Shopping</a></button>
                

                <form class="form" method="POST" action="index.php">
                    <h2>Login Here</h2>
                    <input type="email" name="email" placeholder="Enter Email Here">
                    <input type="password" name="password" placeholder="Enter Password Here">
                    <input class="btnn" type="submit" value="Login" name="send">

                    <p class="link">Don't have an account<br>
                    <a href="account.php" >Sign up </a> here</a></p>
                    <p class="liw">Log in with</p>

                    <div class="icons">
                        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
                    </div>

                </form>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <footer id="footer">

        <p class="Fin">Find us on : </p> <br>
        <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
        <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
        <a href="#"><ion-icon name="logo-google"></ion-icon></a>
        <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
    
        <br><br> 
        <div class="num">
        <p>Contact us</p>
        <p>+216 33 428 215</p>
        <p>9oFty1234@gmail.com</p>
        </div>
    </footer>
</body>
</html>
