<?php
//Elavarasan - Sep 29, 2021

//This page will include initialization file, nothing more
require_once("config.php");

if($_GET){
    $redirect = getUrlsBySlug($_GET['s']);
    if(header('Location: '.$redirect)){
        header('Location: '.$redirect);
    }else{
        require_once('404.php');
    }
}
else
{
    header('Location: dashboard');
}