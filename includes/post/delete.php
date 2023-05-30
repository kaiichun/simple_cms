<?php

    $database = connectToDB();

    $id = $_POST['id'];

    if(empty($id)){
        $error = "ERROR 404 =)";
    }

    if ( isset($error)){
        $_SESSION['error'] = $error;
        header("Location: /manage-posts");
    }  
    
    $sql = "DELETE FROM posts WHERE id = :id";
    $query = $database->prepare($sql);
    $query->execute([
        'id' => $id
    ]);
    
     // set success message
     $_SESSION["success"] = "post has been deleted.";

     // redirect
     header("Location: /manage-posts");
     exit;