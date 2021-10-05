<?php

//Modify Database Credentials
$DB_NAME = 'iums';         // ENTER YOUR DATABASE NAME HERE
$DB_PASS = '';             // ENTER YOUR DATABASE PASSWORD HERE
$DB_HOST = '127.0.0.1';    // ENTER YOUR DATABASE HOST HERE
$DB_USER = 'root';         // ENTER YOUR DATABASE USERNAME HERE

//Create Admin credentials
$iAdmin = 'admin';         // ENTER THE USERNAME THAT YOU WANT TO USE AS A ADMIN
$iPass = 'pass';           // ENTER THE PASSWORD THAT YOU WANT TO USE AS A ADMIN 


// Defining global variables for Database variables
define('DB_NAME',$DB_NAME);
define('DB_PASS',$DB_PASS);
define('DB_HOST',$DB_HOST);
define('DB_USER',$DB_USER);

//Defining admin access variables
define('IADMIN',$iAdmin);
define('IPASS',$iPass);

// Defining global variables for other variables
define('INC_DIR',__DIR__.'/includes');
define('DASH_DIR',__DIR__.'/dashboard');
define('API_DIR',__DIR__.'/api');
define('ASSET_DIR',__DIR__.'/assets');
define('MAIN_DIR',__DIR__);


// Including other essential scripts
require_once(INC_DIR.'/functions.php');