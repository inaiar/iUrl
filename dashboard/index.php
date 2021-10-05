<?php
require_once("../config.php");
session_start();
if($_SESSION==NULL || $_SESSION['loggedin']==false){
    header('Location: ../login');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <title>DASHBOARD</title>
</head>
<body style="font-family: 'Ubuntu', sans-serif;">
    <div class="container is-fluid">
        <div class="section is-small is-flex is-flex-direction-column is-justify-content-center is-align-items-center field is-grouped">
            <p class="control m-4">
                <a class="button is-link">
                    Your links
                </a>
            </p>
            <p class="control m-4">
                <a class="button is-link">
                    Create links 
                </a>
            </p>
            <?php if($_SESSION['isadmin']==true){ ?>
            <p class="control m-4">
                <a class="button is-link">
                    Manage users 
                </a>
            </p>
            <p class="control m-4">
                <a class="button is-link">
                    add user 
                </a>
            </p>
            <p class="control m-4">
                <a class="button is-link">
                    All links
                </a>
            </p>
            <?php } ?>
            <p class="control m-4">
                <a class="button is-link" href="../logout">
                    logout
                </a>
            </p>
        </div>
    </div>
</body>
</html>