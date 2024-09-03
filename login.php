<?php
session_start();
    include("connection.php");

    // $mysqli will be the connection variable to mysql database
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $user_name = $_POST["username"];
        // It is best practice to use prepared statements to prevent injection attacks. It is unique to only one session
        $login_query = $mysqli->prepare("SELECT * FROM employees WHERE id = ?");
        // In quotes we declare the type, either s for string or i for integer
        $login_query->bind_param("i", $id);
        $login_query->execute();
        $query_result = $login_query->get_result();
        $count = mysqli_num_rows($query_result);
        $data = $query_result->fetch_assoc();

        
        if($count == 1){
            // Saving username to varable login_session and redirecting
            $_SESSION['login_user'] = $user_name;
            $login_session = $_SESSION['login_user'];
            header("location: home.php/");
            die();
         } else {
            $error = "Your ID or Name is invalid";
            echo"$error";
         }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
.background{
background-image: linear-gradient(to bottom right, purple, black);
height: 1000px;
}

.words{
    color:purple;
    font-size: 25px;
}

.middle_box{
    background-color: white;
    height:350px;
    width:550px;
    position: absolute;
    top:300px;
    left:700px;
    display: inline-block;
    overflow: hidden;
    box-shadow: 10px 10px 5px black;
}

.form{
    margin-top: 100px;
    height:100%;
    width:100%;
    text-align: center;
}

.button{
    background-color: rgb(184, 135, 184); 
    font-size: 15px;
}

.button:hover{
    background-color: white;
}

.text_box{
    height:20px;
    width:300px;
}
</style>
<body style="margin-top: 0px; margin-left: 0px; margin-bottom: 0px; margin-right: 0px; display: block; overflow: auto; position: relative;">
    <div class="background">
        <div class="middle_box">
            <form class="form" method="post">
                <label class="words">ID:</label><br>
                <input class="text_box" type="text" maxlength="50" name="id"><br>
                <br>
                <label class="words">UserName:</label><br>
                <input class="text_box" type="text" maxlength="50" name="username">
                <br>
                <br>
                <button class="button" onclick="get_id()">Log In</button>
            </form>
        </div>
    </div>
</body>
</html>