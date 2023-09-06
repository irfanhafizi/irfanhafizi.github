<?php
include('check_staff.php'); 
$page = basename(__FILE__);
include('header_staff.php');
?>

<!-- Content start here -->
<?php
include("simple_html_dom.php");
@$html = file_get_html('https://goldrate.com/gold-price-malaysia/');
if ($html === false) {
    http_response_code(404);
    include "404.php";
    exit;
}

$list = $html->find('table[class="table text-left txt-primary mb-0 mt-3 table-exchange-rate"]',0);
$list_array = $list->find('td');

$perf = $html->find('<table[class="table text-right txt-primary mb-0"]',0);
$perf_array = $perf->find('td');

?>

<div class="container flex-wrapper">
<div class="content">
<h2>GOLD PRICE IN MALAYSIA FOR TODAY</h2><hr>
<script>
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    var fulldate = day + "/" + month + "/" + year;
    
    document.write('<h4>Updated '+fulldate+'</h4>');
</script>

    <table class="table  table-striped table-hover table-responsive tableprice" style="">
        <tr class="table-header">
            <th style=""><?php echo $list_array[0]->plaintext; ?></th>
            <th style=""><?php echo $list_array[1]->plaintext; ?></th>
        </tr>
        <?php
        for( $i = 2; $i < sizeof($list_array); $i = $h+1 ){
            $h = $i+1;
            echo "<tr class='table-row'>";
            echo '<td style="">'.$list_array[$i]->plaintext.'</td>';
            echo '<td style="">'.$list_array[$h]->plaintext.'</td>';
            echo "</tr>";
        }
        ?>
        
    </table>
    <p>Our local data is sourced directly, analyzed and tested</p>
<h2>GOLD PRICE PERFORMANCE FOR TODAY</h2>
<hr>
    
<table class="table table-striped table-hover table-responsive" style="">
    <tr class="table-header">
        <th style="text-align:center;">Range</th>
        <th style="text-align:center;">Amount</th>
        <th style="text-align:center;">Change(%)</th>
    </tr>
    <?php
        for( $j = 0; $j < sizeof($perf_array); $j = $l+1 ){
            $k = $j+1;
            $l = $k+1;
            echo "<tr class='table-row'>";
            echo '<td>'.$perf_array[$j]->plaintext.'</td>';
            echo '<td>'.$perf_array[$k]->plaintext.'</td>';
            echo '<td>'.$perf_array[$l]->plaintext.'</td>';
            echo "</tr>";
        }
    ?>
</table>
</div>
</div>

<?php
include('footer.php');
?>
