<?php
//all articles
$articles = allDataFromTable('articles');
//all categories
$categories = allDataFromTable('categories');

//add new article
$msg = "";
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_article'])){
  $title = trim($_POST['title']);
  $autor = $_SESSION['login'];
  $text = trim($_POST['text']);
  $category_id = $_POST['selected_ctg'];

  if($title === "" || $text === "" || $category_id === ""){
    $msg = "Fill in all the fields";
  } else{
      $art_m = [
          'title' => $title,
          'autor' => $autor,
          'art_text' => $text,
          'category_id' => $category_id
      ];
      insert('articles', $art_m);
      header('location: '.'../../admin/articles.php');
  }

}
//edit article
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
$id = $_GET['id'];
$art = getOne('articles', ['id' => $id]);

$title = $art['title'];
$art_text = $art['art_text'];
$category_id = $art['category_id'];
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_article'])){
  $edit_id = $_POST['edit_id'];
  $edit_title = $_POST['edit_title'];
  $edit_text = $_POST['edit_text'];
  $edit_ctg = $_POST['edit_selected_ctg'];
  if($edit_title === "" || $edit_title === ""){
    $msg = "Fill in all the fields";
  } else{
    $edit_art_m = [
      'title' => $edit_title,
      'autor' => $_SESSION['login'],
      'art_text' => $edit_text,
      'category_id' => $edit_ctg,
    ];
    update('articles', $edit_id, $edit_art_m);
    header('location: '.'../../admin/articles.php');
  }
}

// delete article
if($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['del_id']){
  $del_id = $_GET['del_id'];
  delete('articles', $del_id);
  header('location: '.'../../admin/articles.php');
}
?>