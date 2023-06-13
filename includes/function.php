<?php

function connectToDB(){
    $database = new PDO (
    "mysql:host=devkinsta_db;dbname=SimpleCMS",
    "root",
    "JlM9YL7mge6ghuLi");

    return $database;
}

// function to check if the user is currently logged in or not
function isUserLoggedIn() {
    return isUser() || isEditor() || isAdmin() ? true : false;
}

function ifEditorOrAdmin() {
    return isEditor() || isAdmin() ? true : false;
}

// function to check if the user is an admin
function isAdmin() {
    if ( isset( $_SESSION['user']['role'] ) && $_SESSION['user']['role'] === 'admin' ) {
        return true;
    } else {
        return false;
    }
}

function isEditor() {
    if ( isset( $_SESSION['user']['role'] ) && $_SESSION['user']['role'] === 'editor' ) {
        return true;
    } else {
        return false;
    }
}

function isUser() {
    if ( isset( $_SESSION['user']['role'] ) && $_SESSION['user']['role'] === 'user' ) {
        return true;
    } else {
        return false;
    }
}

// function isAdminOrEditor() {
//     return isAdmin() || isEditor() ? true : false;
//     // if ( 
//     //     isset( $_SESSION['user']['role'] ) && 
//     //     (
//     //         $_SESSION['user']['role'] === 'admin' || 
//     //         $_SESSION['user']['role'] === 'editor'
//     //     ) 
//     // ) {
//     //     return true;
//     // } else {
//     //     return false;
//     // }
// }

// function isEditorOrUser() {
//     // shorthand
//     return isUser() || isEditor() ? true : false;
//     // long method
//     // if ( isUser() || isEditor() ) {
//     //     return true;
//     // } else {
//     //     return false;
//     // }
// }
?>