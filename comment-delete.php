<?php
include_once 'connection.php';

$comment_id = $_POST['comment_id'];

$sql_del = "DELETE FROM postcomment WHERE comment_id ='$comment_id' ";
$stmt = $mysqli->prepare($sql_del);
$stmt->execute();

if (! empty($stmt)) {
    echo true;
}
?>