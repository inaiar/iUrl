<?php

/*Getting Database connection*/
function getConnection(){
    $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
    try {
        $conn = new PDO($dsn, DB_USER, DB_PASS);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
}



function checkLogin($username,$password){
  $user = getUser($username);
  if($user==NULL){
    return false;
  }else{
    if($user['password']==$password){
      return true;
    }else{
      //password not match
      return false;
    }
  }
}

function checkAdmin($username,$password){
  $user = getUser($username);
  if($user==NULL){
    return false;
  }else{
    if($user['admin']==1){
      return true;
    }else{ 
      //Not a Admin
      return false;
    }
  }
}

function checkDeclaredAmin($username,$password){
  if($username==IADMIN){
    $user = getUser($username);
    if($user==NULL){
      try {
        createAdmin(IADMIN,IPASS);
      } catch (Exception $e) {
        echo 'error creating admin!';
      }
      $user = getUser($username);
      if($user['password']==$password){
        return true;
      }else{
        //password not match
        return false;
      }
    }else{
      if($user['password']==$password){
        return true;
      }else{
        //password not match
        return false;
      }
    }
  }else
  {
    //username not match
    return false;
  }
}

function getUser($username){
  $conn = getConnection();
  $sql = 'SELECT * FROM users WHERE username=:username';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['username'=>$username]);
  $user = $stmt->fetch();
  return $user;
}

function createAdmin($username,$password){
  $conn = getConnection();
  $sql = 'INSERT INTO users (username, password, admin) VALUES (:username, :password, :admin)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['username'=>$username,'password'=>$password,'admin'=>1]);
}

function createUser($username,$password){
  $conn = getConnection();
  $sql = 'INSERT INTO users (username, password, admin) VALUES (:username, :password, :admin)';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['username'=>$username,'password'=>$password,'admin'=>0]);
}

function getUrlsBySlug($slug){
  $conn = getConnection();
  $sql = 'SELECT * FROM urls WHERE slug=:slug';
  $stmt = $conn->prepare($sql);
  $stmt->execute(['slug'=>$slug]);
  $url = $stmt->fetch();
  return $url['redirect'];
}