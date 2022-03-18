<?php
//registration
$msg="";
if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['reg_submit'])){
    $login = $_POST['login'];
    $passF = $_POST['passwordF'];
    $passS = $_POST['passwordS'];

    if($login === "" || $passF === "" || $passS === ""){
        $msg = "Fill in all the fields";
    } elseif(mb_strlen($login) < 2 || mb_strlen($passF) < 2 || mb_strlen($passS) < 2){
        $msg = "login and password must be more than two symbols";
    } elseif($passF !== $passS){
        $msg = "Passwords in both fields must match";
    } else{
        $user = getOne('users', ['login' => $login]);
        if($user['login'] === $login){
            $msg = "This login is already registered";   
        } else{
            $user_info = [
                'login' => $login,
                'password' => $passF
            ];

            $id = insert('users', $user_info);
            //$_SESSION['id'] = $id;     
            $_SESSION['login'] = $login; 
            header('location: '.'../../index.php');
    }
  } 
}
//authorization
$msg="";
if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['aut_submit'])){
  $login = trim($_POST['log']);
  $password = trim($_POST['pass']);

  $user = getOne('users', ['login' => $login]);

  if($login === "" || $password === ""){
    $msg="Fill in all the fields";
  } elseif($user['login'] !== $login || $user['password'] !== $password){
    $msg="login or password entered incorrectly";
  } else{
    $_SESSION['login'] = $login;
    if($user['admin']){
    $_SESSION['admin'] = $user['admin'];
    }
    header('location: '.'index.php');
  }
}
//add new user in admin panel
$msg="";
if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['add_user'])){
    $login = $_POST['add_login'];
    $pass = $_POST['add_password'];

    if($login === "" || $passF === "" || $passS === ""){
        $msg = "Fill in all the fields";
    } elseif(mb_strlen($login) < 2 || mb_strlen($pass) < 2){
        $msg = "login and password must be more than two symbols";
    } else{
        $user = getOne('users', ['login' => $login]);
        if($user['login'] === $login){
            $msg = "This login is already registered";   
        } else{
            $user_info = [
                'login' => $login,
                'password' => $pass
            ];

            $id = insert('users', $user_info);
            //$_SESSION['id'] = $id;     
            header('location: '.'users.php');
    }
  } 
}
// all users from db
$users = allDataFromTable('users');

// edit user
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
  $id = $_GET['id'];
  $edit_user = getOne('users', ['id' => $id]);
  $edit_login = $edit_user['login'];
  $edit_password = $edit_user['password'];
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_user'])){
  $edit_id = $_POST['edit_id'];
  $edit_login = $_POST['edit_login'];
  $edit_password = $_POST['edit_password'];
     
      if($edit_login === "" || $edit_password === ""){
        $msg = "Fill in all the fields";
      } elseif(mb_strlen($edit_login) < 2 || mb_strlen($edit_password) < 2){
        $msg = "login and password must be more than two symbols";
      } else{
          $edit_user_m = [
            'login' => $edit_login,
            'password' => $edit_password
          ];
          update('users', $edit_id, $edit_user_m);
          header('location: '.'../../admin/users.php');
        }
      }

// delete user
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
  $del_id = $_GET['del_id'];
  delete('users', $del_id);
  header('location: '.'../../admin/users.php');
}
?>