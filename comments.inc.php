<?php

function setComments($conn)
{
    if (isset($_POST['CommentSubmit'])) {
        $users_id = $_POST["user_id"];
        $created_at = $_POST["date"];
        $comment_text = $_POST["message"];
        $sql = "INSERT INTO  ppl_comments (user_id,date,message) VALUES ('$users_id','$created_at','$comment_text') ";
        $result = $conn->query($sql);
        header("Location:index.php");
    }
}




function getcomments($conn)
{
    $sql = "SELECT * FROM ppl_comments";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $id = $row['user_id'];
        $sql2 = "SELECT * FROM user WHERE id='$id'";
        $result2 = $conn->query($sql2);
        if ($row2 = $result2->fetch_assoc()) {
            echo "<div class='comment-box'><p>";
            echo $row2['uid'] . "<br>";
            echo $row['date'] . "<br>";
            echo nl2br($row['message']);
            echo "<p/>";

            if (isset($_SESSION['id'])) {
                if ($_SESSION['id'] == $row2['id']) {

                    echo "<form method ='POST' action='" . deleteComment($conn) . "'>
            <input type='hidden' name='comments_id' value='" . $row['comments_id'] . "'>
            <button type='submit' class='delete-btn' name='commentdelete'>delete</button>
            </form>

            <form method ='POST' action='editcomment.php'>
            <input type='hidden' name='comments_id' value='" . $row['comments_id'] . "'>
            <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
            <input type='hidden' name='date' value='" . $row['date'] . "'>
            <input type='hidden' name='message' value='" . $row['message'] . "'>
            <button class='edit-btn'>edit</button>
            </form>";

                }


            }
            echo "</div>";


        }


    }

}


function getlogin($conn)
{
    if (isset($_POST['loginSubmit'])) {
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        $sql = "SELECT * FROM user WHERE uid='$uid' AND pwd='$pwd'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            if ($row = $result->fetch_assoc()) {

                $_SESSION['id'] = $row['id'];
                header("Location: index.php?loginsuccess");
                exit();
            }
        } else {

            header("Location: index.php?loginfaled");
            exit();
        }
    }


}



function userlogout()
{
    if (isset($_POST['logoutsubmit'])) {
        session_start();
        session_destroy();
        header("Location: index.php");
        exit();

    }



}



function editComment($conn)
{
    if (isset($_POST['CommentSubmit'])) {
        $comment_id = $_POST["comments_id"];
        $users_id = $_POST["user_id"];
        $created_at = $_POST["date"];
        $comment_text = $_POST["message"];
        $sql = "UPDATE ppl_comments SET  message='$comment_text' WHERE comments_id='$comment_id'";
        $result = $conn->query($sql);
        header("Location:index.php");

    }

}
function deleteComment($conn)
{

    if (isset($_POST['commentdelete'])) {
        $comment_id = $_POST["comments_id"];

        $sql = "DELETE FROM ppl_comments  WHERE comments_id='$comment_id'";
        $result = $conn->query($sql);
        header("Location:index.php");

    }
}


