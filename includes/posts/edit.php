<?php
     // make sure the user is logged in
     if ( !Auth::isUserLoggedIn() ) {
        header("Location: /");
        exit;
    }

    $database = connectToDB();

    $title = $_POST["title"];
    $content = $_POST["content"];
    $status = $_POST["status"];
    $id = $_POST["id"];

    if(empty($content) || empty($status)) {
        $error = "Please enter field";
    }

    if (isset($error)) {
        $_SESSION['error']=$error;
        header("Location: /manage-post-edit?id=$id");
        exit;
    }

    $sql = "UPDATE posts SET title = :title, content = :content, status = :status, modified_by = :modified_by WHERE id = :id";
    $query = $database->prepare($sql);
    $query->execute([
        'title' => $title,
        'content' => $content,
        'status' => $status,
        'id' => $id,
        'modified_by' => $_SESSION['user']['id']
    ]);

    $_SESSION["success"] = "Post edited";
    $_SESSION["update_post"] = $title;

    header("Location: /manage-post");
    exit;
?>