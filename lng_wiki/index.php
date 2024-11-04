<!DOCTYPE html>

<?php
    include "connect.php";
    $per = 12;
    $page = isset($_GET["page"]) ? intval($_GET["page"]) : 1;
    $lngwiki_sql = "SELECT COUNT(*) as total FROM vods";
    $result = mysqli_query($lngwiki_db, $lngwiki_sql);
    $row = mysqli_fetch_assoc($result);
    $rowcount = $row['total'];
    $pages = ceil($rowcount / $per);

    // 計算每頁開始的資料序號
    $start = ($page - 1) * $per;

    // 查詢指定範圍的資料
    $lngwiki_sql = "SELECT * FROM vods ORDER BY date DESC LIMIT $start, $per";
    $result = mysqli_query($lngwiki_db, $lngwiki_sql);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LNG-wiki</title>
    <link rel="icon" href="https://yt3.googleusercontent.com/ytc/AIdro_kv_7s9xm0c-PgXHTPn4vq3hywtPyQRAtqLPS0j_a_0Xw=s176-c-k-c0x00ffffff-no-rj">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="style.css?v=<?=time()?>" type="text/css">
</head>

<body>
    <div class="page">
        <div class="sidebar"> 
            <div class="title">LNG wiki</div> 
                <div class="navbar-nav">     
                    <div class="nav-item">
                        <a class="nav-link" href="index.php">首頁</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="search3.php">搜尋關鍵字</a>
                    </div>
                    <div style="color: #6e6e6e; margin-top:20px">問題回報</div>
                </div>
        </div>
        <div class="marquee-container">
            <div class="marquee-content"></div>
        </div>
        
        <div class="main">
            <div class="info">
                <a href="https://www.youtube.com/@LNGworkshop" style="text-decoration: none;">
                    <div class="YTinfo">
                        <img src="https://yt3.googleusercontent.com/ytc/AIdro_kv_7s9xm0c-PgXHTPn4vq3hywtPyQRAtqLPS0j_a_0Xw=s160-c-k-c0x00ffffff-no-rj" width="50" height="50" style="border-radius:50%;">LNG 實況存檔
                    </div>
                </a>
                <a href="https://www.youtube.com/@lng6121" style="text-decoration: none;">
                    <div class="YTinfo">
                        <img src="https://yt3.googleusercontent.com/ytc/AIdro_lfO6z6DatzQW5CkKsHy7gU4xd8Ysdsc9JrQgKmtjqcSQ=s160-c-k-c0x00ffffff-no-rj" width="50" height="50" style="border-radius:50%;">LNG 精華頻道
                    </div>
                </a>
            </div>
            
            <table class="table table-bordered">
                <tbody>
                    <?php
                        if ($rowcount > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td><a class='table-link' href='video_info.php?id=".$row['v_id']."&searchText=".urlencode($row['vname'])."&action=sent'>" . $row['vname'] . "</a></td>";
                                echo "<td><a class='table-link' href='delete/delete2.php?id=".$row['v_id']."'>刪除</a></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php
                    // 分頁頁碼顯示
                    echo '共 ' . $rowcount . ' 筆 - 在第 ' . $page . ' 頁 - 共 ' . $pages . ' 頁';
                    echo "<br /><a href='?page=1'>首頁</a> ";
                    echo "第 ";
                    for ($i = 1; $i <= $pages; $i++) {
                        if ($page - 3 < $i && $i < $page + 3) {
                            if ($i == $page) {
                                echo "<strong>$i</strong> "; // 高亮顯示當前頁碼
                            } else {
                                echo "<a href='?page=$i'>$i</a> ";
                            }
                        }
                    }
                    echo " 頁 <a href='?page=$pages'>末頁</a><br /><br />";
                ?>
            </div>
        </div>
    </div>

    <script src="./script.js"></script>
</body>

</html>
