<?php
include 'dbh.inc.php';
include 'comments.inc.php';
date_default_timezone_set("Africa/Lagos");



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .comment-box {
        border: 2px solid red;
        margin-block: 10px;

    }
</style>

<body>

    <div>
        <h2>you arte editing</h2>
    </div>
    <?php
    $comments_id = $_POST["comments_id"];
    $users_id = $_POST["user_id"];
    $created_at = $_POST["date"];
    $comment_text = $_POST["message"];

    echo "
   
   <form method='POST' action='" . editComment($conn) . "'>
   <input type='hidden' name='comments_id' value='" . $comments_id . "'>
   <input type='hidden' name='user_id' value='" . $users_id . "'>
   <input type='hidden' name='date' value='" . $created_at . "'>
   <textarea name='message' >" . $comment_text . "</textarea>
   <br/>
   <button name='CommentSubmit' type='submit'>edit</button>
</form>
   ";


    ?>
</body>

</html>