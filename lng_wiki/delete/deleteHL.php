<?php
include "../connect.php";

if (empty($_GET['uid']) || empty($_GET['vod_id']) || empty($_GET['searchText'])) {
  die('請輸入 id、vod_id 和 searchText');
}
$uid = $_GET['uid'];
$vod_id = $_GET['vod_id'];
$searchText = $_GET['searchText'];
  
$sql = "DELETE FROM `unofficial_highlight` WHERE `unofficial_highlight`.`id` = $uid";

$result = mysqli_query($lngwiki_db, $sql);
if (!$result) {
  die($conn->error);
}

  // 如果刪除成功
header("Location: ../test.php?id=$vod_id"."&searchText=" . urlencode($searchText) . "&action=sent");
?>