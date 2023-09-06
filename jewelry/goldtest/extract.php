<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <h1>GOLD PRICE<br>
    <script>
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth()+1;
    var year = date.getFullYear();
    var fulldate = day + "/" + month + "/" + year;
    document.write(fulldate);
    </script>
    </h1>
    
    <?php
    include("simple_html_dom.php");

    $html = file_get_html('https://goldrate.com/gold-price-malaysia/');

    $h = $html->find("li h2");
    ?>

    <table border=1>
        <tr>
            <th>22kt Price</th>
            <th>24kt Price</th>
        </tr>
        <tr>
            <td>RM <?php echo $h[0]->text(); ?></td>
            <td>RM <?php echo $h[1]->text(); ?></td>
        </tr>
    </table>
</body>
</html>