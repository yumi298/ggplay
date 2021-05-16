
<?php
include "dbhelper.php";

if (isset($_GET['data']) && $_GET['data'] != '') {
    $result = $_GET['data'];
	$sql = "select * from app where name_app like'%$result%' ";
    $productList = execute_result($sql);
    $index = 1;
    foreach ($productList as $pdl) {
        echo "<img src='img/".$pdl['img']."'/>";
        echo
        "<a href='".strtolower($pdl['name_app']).".php'>".$pdl['name_app']."</a>";
        echo
        '<div>'.$pdl['price'].'</div>';
        echo
        '<div>'.$pdl['category'].'</div>';
        echo
        '<div>'.$pdl['description'].'</div>';
    }
}

?>
