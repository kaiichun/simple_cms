<?php
    // make sure the user is logged in
    if ( !Auth::isUserLoggedIn() ) {
        header("Location: /");
        exit;
    }

    $database = connectToDB();

    $title = $_POST['title'];
    $content = $_POST['content'];

    if(empty( $title ) || empty( $content )){
        $error = "Please enter all fields";
    }

    if (isset($error)){
        $_SESSION['error'] = $error;
        header("Location: /manage-post-add");
    }else{
        $sql = "INSERT INTO posts (`title`, `content`, `user_id`)
        VALUES(:title, :content, :user_id)";
        $query = $database->prepare( $sql );
        $query->execute([
            'title' => $title,
            'content' => $content,
            'user_id' => $_SESSION["user"]["id"]
        ]);
        
        $_SESSION["success"] = "New post added";
        header("Location: /manage-post");
        exit;
    }

?>