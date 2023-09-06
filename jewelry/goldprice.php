<?php
include("simple_html_dom.php");

$user_id = $_SESSION['user_id'];
@$html = file_get_html('https://goldrate.com/gold-price-malaysia/');
if ($html === false) {
    
}else{
$list = $html->find('table[class="table text-left txt-primary mb-0 mt-3 table-exchange-rate"]',0);

$kt22 = $list -> find('td',7)->plaintext;
$kt18 = $list->find('td',13)->plaintext;

$update22kt = mysqli_query($connection, "UPDATE gold SET price='$kt22' WHERE purity=916");
$update18kt = mysqli_query($connection, "UPDATE gold SET price='$kt18' WHERE purity=750");
}
?> 