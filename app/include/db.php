<?php
session_start();
echo "start";

$connect = new PDO("mysql:host=localhost; dbname=mb; charset=utf8", "mysql", "");
// $sql = "INSERT users (login, password) VALUE ('Admin', '1111')";
// $connect->exec($sql);


// $login = "login";
// $password ="password";

// $param = [
//     'login' => $login,
//     'password' => $password
// ];
// $sql = "INSERT users (login, password) VALUE (:login, :password)";
// $query = $connect -> prepare($sql);
// $query -> execute($param);

// Get all data from one table

function allDataFromTable($table, $params = []){
    global $connect;
    $sql = "SELECT*FROM $table";

    if(!empty($params)){
     $i = 0;
     foreach($params as $key => $value){
         if(!is_numeric($value)){
            $value = "'".$value."'";
         } 
         if($i === 0){
             $sql= $sql." WHERE $key=$value";
         } else{
            $sql = $sql." AND $key = $value";
         }
         $i++;
     }
    }
   $query = $connect -> prepare($sql);
   $query -> execute();
   return $query -> fetchAll();
}

// Get one row from  table

function getOne($table, $params = []){
    global $connect;
    $sql = "SELECT*FROM $table";

    if(!empty($params)){
     $i = 0;
     foreach($params as $key => $value){
         if(!is_numeric($value)){
            $value = "'".$value."'";
         } 
         if($i === 0){
             $sql= $sql." WHERE $key=$value";
         } else{
            $sql = $sql." AND $key = $value";
         }
         $i++;
     }
    }
   $query = $connect -> prepare($sql);
   $query -> execute();
   return $query -> fetch();
}


// $users = allDataFromTable('users', ['login'=>'Admin']);
// echo '<pre>'; print_r($users); echo '</pre>'; 

// function insert into table
function insert($table, $param){
    global $connect;
    $i = 0;
    $colls = "";
    $values = "";
    foreach($param as $key => $value){
        if($i === 0){
            $colls = $colls."$key";
            $values = $values."'"."$value"."'";
        } else{
            $colls = $colls. ", $key";
            $values = $values.", '"."$value"."'";
        }
    $i++;
    }
    $sql = "INSERT INTO $table ($colls) VALUES ($values)";
    $query = $connect -> prepare($sql);
    $query -> execute($param);
    return $connect -> lastInsertId();
}

$m = [
    'login' => 'admin2',
    'password' => '2222'
];
//insert("users", $m);

// function update
function update($table, $id, $params){
    global $connect;
    $i = 0;
    $str = "";
    foreach($params as $key => $value){
        if($i === 0){
          $str =$str. $key."="."'".$value."'";
        } else{
            $str = $str.", ".$key."= '".$value."'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $connect -> prepare($sql);
    $query -> execute();
    //UPDATE `users` SET `password` = '22222' WHERE `users`.`id` = 7;
}
// function delete
  function delete($table, $id){
       global $connect;
       $sql = "DELETE FROM `$table` WHERE id = $id";
       $query = $connect -> prepare($sql);
       $query-> execute();
  } 
      //join 2 table, article with category
      function singleArt($id){
      global $connect;
      $sql_single = "SELECT 
      articles.id, 
      articles.title, 
      articles.autor, articles.art_text, 
      articles.date, categories.ctg_name 
      FROM articles JOIN categories ON articles.category_id = categories.id
      WHERE  articles.id = $id";
      $query_single = $connect -> prepare($sql_single);
      $query_single -> execute();
      return $query_single -> fetch();
      }
     // echo '<pre>'; print_r($single_art); echo '</pre>'; 

     // SEARCH
     function search($text){
         global $connect;
         $sqlS = "SELECT 
         articles.id, 
         articles.title, 
         articles.autor, articles.art_text, 
         articles.date, categories.ctg_name 
         FROM articles JOIN categories ON articles.category_id = categories.id
         AND articles.title LIKE '%$text%' OR articles.art_text LIKE '%$text%'
         ";
        $queryS = $connect -> prepare($sqlS);
        $queryS -> execute();
        return $queryS -> fetchAll();
     }
  
?> 