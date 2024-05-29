<?php
include 'dbh.inc.php';
include 'comments.inc.php';
date_default_timezone_set("Africa/Lagos");
session_start();



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>🎉🧑‍💻👨‍💻</title>

</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

    body {

        padding: 0px 5px;
    }


    .comment-box {
        border: 3px solid;
        border-radius: 3px;
        margin-top: 10px;
        padding: 10px 10px;


    }

    .comment-box p {
        word-wrap: break-word;
    }

    .intro {
        text-align: center;
        margin-top: 20px;
    }

    .intro h1 {
        text-transform: uppercase;
    }

    .intro p {
        line-height: 20px;
        font-size: 14px;
    }

    .login-form {

        margin-bottom: 25px;

    }

    .login-form input {
        padding: 8px 15px;
        border: 2px solid red;
        border-radius: 5px;

    }



    .login-form button,
    .logoutsubmit,
    .comment-btn {
        padding: 7px 15px;
        margin-top: 10px;
        border: 2px solid red;
        border-radius: 5px;
        letter-spacing: 1px;
        font-size: 18px;
    }

    .delete-btn {
        display: inline;
        padding: 5px 20px;
        border-radius: 3px;
        background-color: red;
        color: #fff;
        text-transform: uppercase;

    }

    .edit-btn {
        padding: 5px 26px;
        margin: 0;
        display: inline;
        letter-spacing: 1px;
        border-radius: 3px;
        background-color: greenyellow;
        text-transform: uppercase;
        border: 2px solid;

    }

    .logoutsubmit {
        margin: 0;
        background-color: red;
        border: 2px solid black;
        color: #fff;

    }

    .comment-box form {
        display: inline-block;
    }

    .needtologin-msg {
        display: block;
        font-size: 14px;
        padding-left: 15px;


    }

    .notlogedin-msg {
        padding-left: 15px;
    }

    .comment-btn {
        background-color: greenyellow;
        width: 550px;
        margin-top: 0px;
    }

    .notlog {

        margin-top: -10px;
    }

    .notlog p {
        margin-top: 10px;
    }

    textarea {
        padding: 7px 15px;

        border: 2px solid red;
        width: 550px;
        border-radius: 5px;
        letter-spacing: 1px;
        font-size: 18px;
        resize: none;
        height: 200px;
    }
</style>

<body>



    <div class="intro">
        <h1>🧑‍💻 welcome to 2024 👨‍💻</h1>
        <p>How is 2024 treating you kindly drop a comment below on how this year has been for you so far so good.
            <span>no worry na all of us dey see shege trus me your own fit no worst pass person wey comment above or
                below you😂</span>
        </p>
    </div>


    <?php

    echo "
  <form class='login-form' method='POST' action='" . getlogin($conn) . "'>
  <input type='text' name='uid'>
  <input type='password' name='pwd'>
  <button type='submit' name='loginSubmit'>login</button>
</form>";




    if (isset($_SESSION['id'])) {
        echo "<div class='notlog'>
       
       

       <form method='POST' action='" . userlogout() . "'>  
       <button type='submit' class='logoutsubmit' name='logoutsubmit'>logout</button>
       <p class='logedin-msg'><b>🥳You are logged in.Now you can comment below👇</b><p/>
       </form>
       
       </div>";
    } else {
        echo "<p class='notlogedin-msg'><b>😢You are not loggedin</b><p/>";
    }

    ?>



    <?php


    if (isset($_SESSION['id'])) {
        echo "
    <form method='POST' action='" . setComments($conn) . "'>
        <input type='hidden' name='user_id' value='" . $_SESSION['id'] . "'>
        <input type='hidden' name='date' value='" . date('Y-m-d H:i:s') . "'>
        <textarea name='message' placeholder='Enter your comment' ></textarea>
        <br/>
        <button name='CommentSubmit' class='comment-btn' type='submit'>Post Comment</button>
     </form>
        ";
    } else {
        echo "<p class='needtologin-msg'><b>Sorry, but you need to login b4 you can Comment/post😢</b><p/>";
    }

    getcomments($conn);

    ?>



</body>

</html>