<?php
//all categories
$categories = allDataFromTable('categories');
//add category
$msg = "";
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_ctg'])){
    $ctg_name = $_POST['add_ctg_name'];
    if($ctg_name === ""){
        $msg = "Fill the field";
    } else{
    $category = getOne('categories', ['ctg_name' => $ctg_name]);
    if($category['ctg_name'] === $ctg_name){
        $msg = "This category is already registered";
    } else{

        $ctg_m = [
            'ctg_name' => $ctg_name
        ];

        insert('categories', $ctg_m);
        header('location: '. '../../admin/category.php');
      }

    }
}
// edit category
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset ($_GET['id'])){
    $id = $_GET['id'];
    $category = getOne('categories', ['id' => $id]);
    $ctg_name = $category['ctg_name'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_ctg'])){
    $edit_ctg_id = $_POST['edit_ctg_id'];
    $edit_ctg_name = trim($_POST['edit_ctg_name']);
    if($edit_ctg_name === ""){
        $msg = "Fill the field";
    } else{
        $edit_ctg_m = [
            'ctg_name' => $edit_ctg_name
        ];

        update('categories', $edit_ctg_id, $edit_ctg_m);
        header('location: '.'../../admin/category.php');
    }
}
// delete category
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $del_id = $_GET['del_id'];
    delete('categories', $del_id);
    header('location: '. '../../admin/category.php');
}
  // articles  by category
  if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ctg'])){
    $ctg_id = $_GET['ctg'];
}
  $sqlCtg = "SELECT 
  articles.id, 
  articles.title, 
  articles.autor, articles.art_text, 
  articles.date, categories.ctg_name, categories.id
  FROM articles JOIN categories ON articles.category_id = categories.id
  WHERE categories.id = $ctg_id;
  ";
  $queryCtg = $connect -> prepare($sqlCtg);
  $queryCtg -> execute();
  $articlesByCtg = $queryCtg -> fetchAll();

  // Select one category
  $category_name = getOne('categories', ['id' => $ctg_id]);
?>