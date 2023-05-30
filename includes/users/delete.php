<?php

    $database = connectToDB();

    $id = $_POST['id'];

    if(empty($id)){
        $error = "ERROR 404 =)";
    }

    if ( isset($error)){
        $_SESSION['error'] = $error;
        header("Location: /manage-users");
    }  
    
    $sql = "DELETE FROM users WHERE id = :id";
    $query = $database->prepare($sql);
    $query->execute([
        'id' => $id
    ]);
     // set success message
     $_SESSION["success"] = "user has been deleted.";

     // redirect
     header("Location: /manage-users");
     exit;