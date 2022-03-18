<?php
//join 2 table, articles with category
      $index_page = isset($_GET['index_page']) ? $_GET['index_page'] : 1;
      $offset = 5 *($index_page - 1);
      $sql = "SELECT 
      articles.id, 
      articles.title, 
      articles.autor, articles.art_text, 
      articles.date, categories.ctg_name 
      FROM articles JOIN categories ON articles.category_id = categories.id
      LIMIT 5 OFFSET $offset
      ";
      $query = $connect -> prepare($sql);
      $query -> execute();
      $articles2 = $query -> fetchAll();
      
      // COUNT TABLE ROWS
      function countLines($table){
          global $connect;
          $sqlCount = " SELECT  COUNT(*) FROM $table";
          $queryCount = $connect -> prepare($sqlCount);
          $queryCount -> execute();
          return $queryCount -> fetchColumn();
      }
      $index_pages = ceil(countLines('articles') / 5);



      ?>