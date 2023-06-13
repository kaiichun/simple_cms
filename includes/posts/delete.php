<?php
      // make sure the user is logged in
      if ( !Auth::isUserLoggedIn() ) {
        header("Location: /");
        exit;
    }


    $database = connectToDB();

    $id = $_POST["id"];

    if(empty($id)){
        $error = "Error 404";
    }

    if (isset($error)){
        $_SESSION['error'] = $error;
        header("Location: /manage-post");
        exit;
    }

    $sql = "DELETE FROM posts WHERE id = :id";
    $query = $database->prepare($sql);
    $query->execute([
        'id' => $id
    ]);

    $_SESSION["success"]="Post deleted";

    header("Location: /manage-post");
    exit;
?>