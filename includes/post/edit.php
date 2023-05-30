<?php
$database = connectToDB();
$title = $_POST['title'];
$content = $_POST['content'];
$status = $_POST['status'];
$id = $_POST['id'];
if(empty($title) || empty($content) || empty($status) || empty($id)){
    $error = "Make sure all the fields are filled.";
}
if ( isset( $error ) ) {
    $_SESSION['error'] = $error;
    header("Location: /manage-posts-edit?id=$id");
    exit;
}
// if no error found, update the user data based whatever in the $_POST data
$sql = "UPDATE posts SET title = :title, content = :content, status = :status WHERE id = :id";
$query = $database->prepare($sql);
$query->execute([
    'title' => $title,
    'content' => $content,
    'status' => $status,
    'id' => $id
]);
// set success message
$_SESSION["success"] = "Successfully Edited.";
// redirect
header("Location: /manage-posts");
exit;







