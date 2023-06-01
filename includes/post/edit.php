<?php

    // make sure the user is logged in
    if ( !isUserLoggedIn() ) {
        header("Location: /");
        exit;
    }

    // load the database
    $database = connectToDB();

    // get all the $_POST data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $id = $_POST['id'];
 
    /* 
        do error check
        - make sure all the fields are not empty
    */
    if(empty($title) || empty($content) || empty($status) || empty($id) ){
        $error = "All fields is required";
    }

    // if error found, set error message & redirect back to the manage-posts-edit page with id in the url
    if ( isset( $error ) ) {
        $_SESSION['error'] = $error;
        header("Location: /manage-posts-edit?id=$id");
        exit;
    }

    // if no error found, update the post data based whatever in the $_POST data
    $sql = "UPDATE posts SET title = :title, content = :content, status = :status, modified_by = :modified_by WHERE id = :id";
    $query = $database->prepare($sql);
    $query->execute([
        'title' => $title,
        'content' => $content,
        'status' => $status,
        'id' => $id,
        'modified_by' => $_SESSION["user"]['id']
    ]);

    // set success message
    $_SESSION["success"] = "Post has been edited.";

    // redirect
    header("Location: /manage-posts");
    exit;