<?php
$conn = new mysqli("localhost", "root", "", "webdidong");
if ($conn->connect_error){
    die("Failed to connect!".$conn->connect_error);
}
if (isset($_POST['query'])){
    $inpText=$_POST['query'];
    $query="SELECT ten_sp 
            FROM sanpham 
            WHERE ten_sp LIKE '%$inpText%' 
            OR gia_sp LIKE '%$inpText%'
            OR gia_km LIKE '%$inpText%'
            OR ram LIKE '%$inpText%' 
            OR rom LIKE '%$inpText%' 
            LIMIT 10;
    ";
    $result = $conn->query($query);
    if ($result->num_rows>0){
        while ($row=$result->fetch_assoc()){
            echo "<a id='asearch' class='list-group-item border-1' style='cursor: pointer'>"
                .$row['ten_sp']."</a>";
        }
    }
    else{
        echo "<p class='list-group-item'>Không tìm thấy sản phẩm nào</p>";
    }
}
?>