<?php
include "dbhelper.php";

$sql = "SELECT * FROM app WHERE id = 3";

$result = execute_result($sql);
foreach ($result as $rs){
    echo "<img src='img/".$rs['img']."'/>";
    echo "<h2>Tiêu đề: ".$rs['name_app']."</h2><br/>";
    echo "<p>Giá:" .$rs['price']. "</p><br/>";
    echo "<p>Nội dung: ".$rs['description']."</p><br/>";
   
}
$sql1 = "SELECT * FROM app WHERE category = '".$rs['category']."' and id != '".$rs['id']."'";
$result1 = execute_result($sql1);
foreach ($result1 as $rs1){
    echo "<img src='img/".$rs1['img']."'/>";
    echo "<h2>Tiêu đề: ".$rs1['name_app']."</h2><br/>";
    echo "<p>Giá:" .$rs1['price']. "</p><br/>";
    echo "<p>Nội dung: ".$rs1['description']."</p><br/>";
    echo "<p>Category: ".$rs1['category']."</p><br/>";
}
?>