<?php
    include "../connect.php";

  if (empty($_GET['id'])) {
    die('請輸入 id');
  }
    $id = $_GET['id'];
  
    $sql = "DELETE FROM `vods` WHERE `vods`.`v_id` = $id";

  $result = mysqli_query($lngwiki_db, $sql);
  if (!$result) {
    die($conn->error);
  }

  // 如果刪除成功
  header('Location: ../index.php');
?>