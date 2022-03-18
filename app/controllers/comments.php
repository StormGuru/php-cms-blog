<?php
//all commentaries
$comments = allDataFromTable('comments');
// commentaries by page
$comments_single = allDataFromTable('comments', ['page' => $_GET['id']]);
echo '<pre>'; print_r($comment_single); echo '</pre>';
//add comment
$msg="";
if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['add_comment'])){
    $com_text = $_POST['comment_text'];
    $page = $_GET['id'];
    if($com_text === ""){
        $msg="Fill in the field";
    } elseif(mb_strlen($com_text) < 5){
        $msg="comment must be more than five symbols";
    } else{
        $comment = [
            'autor'=> $_SESSION['login'],
            'page' => $page,
            'com_text' => $com_text
        ];
        insert('comments', $comment);
        //header('location: '.'../../single.php');
    }
}
 //edit comment
 $msg="";
 if( $_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
     $id = $_GET['id'];
     $commentById = getOne('comments', ['id' => $id]);
 }
 if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST['edit_com'])){
     $com_id = $_POST['com_id'];
     $com_text = $_POST['com_text'];
     if($com_text === ""){
         $msg="Fill in the field";
     } else{
         $com_edit = [
             'com_text' => $com_text
         ];
         update('comments', $com_id, $com_edit);
         header('location: '.'../../admin/comments.php');
     }
 }
 
 //delete comment
 if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
     $del_id = $_GET['del_id'];
     delete('comments', $del_id);
     header('location: '.'../../admin/comments.php');
 }

?>