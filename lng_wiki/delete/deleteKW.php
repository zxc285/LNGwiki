<?php
include "../connect.php";

if (empty($_GET['key_id']) || empty($_GET['vod_id']) || empty($_GET['searchText'])) {
    die('請輸入 key_id、vod_id 和 searchText');
}

$key_id = $_GET['key_id'];
$vod_id = $_GET['vod_id'];
$searchText = $_GET['searchText'];

$sql = "DELETE FROM `keyword` WHERE `key_id` = $key_id";

$result = mysqli_query($lngwiki_db, $sql);
if (!$result) {
    die($lngwiki_db->error);
}

// 如果刪除成功，重定向回搜尋結果頁面，帶上 searchText 參數
header("Location: ../video_info.php?id=$vod_id"."&searchText=" . urlencode($searchText) . "&action=sent");
?>