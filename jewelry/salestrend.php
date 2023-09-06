<?php 
include('check_user.php'); 
//check if user if an administrator
$page = basename(__FILE__);
include('header_user.php'); 
//load header content for admin page
include("connection.php"); 
// connction to database
$user_id = $_SESSION['user_id'];
$shop= $_SESSION['shop'];
?>

<div class="container flex-wrapper">
<div class="content">
    <h2>Sales Chart</h2>
    <hr />
    <form class="form-inline" method="get">
  <div class="form-group">
    <label for="year-picker">Select Year:</label>
    <select name="filter" class="form-control" id="year-picker" onchange="form.submit()">
      <option value="0">Year</option>
      <?php
        $currentYear = date('Y');
        $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);
        for ($i = 0; $i < 6; $i++) {
          $year = $currentYear - $i;
          echo "<option value='$year'";
          if ($filter == $year) {
            echo " selected";
          }
          echo ">$year</option>";
        }
      ?>
    </select>
  </div>
</form>
      <h4 style="text-align: center;">Total Sales for the year <?php if($filter){
            $year = $_GET['filter'];
        }else{
            $year = date('Y');
        }echo $year; ?></h4>
    <div id="linechart"></div>
    <br><br>
    <h4 style="text-align: center;">Total Sales by Category for the year <?php echo $year ?></h4>
    <div id="catchart"></div>
</div> 
<!--/.content -->
</div> 
<!--/.container -->
<?php include('footer.php'); ?>
</body>
<script>
    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(saleschart);
    google.charts.setOnLoadCallback(salesbycat);

    function saleschart(){
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Total Sales');

        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var tickMarks = [];

        <?php
        if($filter){
            $currentYear = $_GET['filter'];
        }else{
            $currentYear = date('Y');
        }
        
      for ($i = 0; $i < 12; $i++) {
        $total = 0;
        
        $month = $i + 1;

        $sql = mysqli_query($connection, "SELECT * FROM sales WHERE sales_datetime LIKE '$currentYear-$month-%' AND shop = '$shop'");
        while($row = mysqli_fetch_assoc($sql)) {
          $total += $row['price'];
        }

        echo "data.addRow([months['$i'], $total]);";
        echo "tickMarks.push({v: $i, f: '$month'});";
      }
    ?>

        var options = {
            backgroundColor: 'transparent',
            chartArea: { backgroundColor: 'transparent' },
            vAxis: {
            title: 'Price (MYR)',
            titleTextStyle: {
              fontSize: 20
            },
            viewWindow: { min:0}
            },
            hAxis: {
            title: 'Month',
            titleTextStyle: {
                fontSize: 20
            },
            ticks: tickMarks
            },
            height: 400,
            
        };
        var chart = new google.charts.Line(document.getElementById('linechart'));
        chart.draw(data, google.charts.Line.convertOptions(options));
    }

    function salesbycat(){
      var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        <?php
        $category = mysqli_query($connection, "SELECT * FROM category WHERE shop = '$shop'");
        while($row = mysqli_fetch_assoc($category)) {
            echo "data.addColumn('number', '".$row['category']."');";
          }
        ?>

        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var tickMarks = [];

        <?php
        if($filter){
            $currentYear = $_GET['filter'];
        }else{
            $currentYear = date('Y');
        }
        
      for ($i = 0; $i < 12; $i++) {
        $month = $i + 1;

        echo "data.addRow([months['$i']";
        $category = mysqli_query($connection, "SELECT * FROM category WHERE shop = '$shop'");
        while($row = mysqli_fetch_assoc($category)) {
            $cat = $row['id'];
            $totalcat = 0;
            echo ",";
        $sql1 = mysqli_query($connection, "SELECT * FROM sales
        JOIN inventory ON inventory.stock_id = sales.stock_id
        WHERE sales.sales_datetime LIKE '$currentYear-$month-%' AND inventory.jewel='$cat' AND sales.shop = '$shop'");
        while($row1 = mysqli_fetch_assoc($sql1)) { $totalcat += $row1['price']; }
        echo $totalcat;
        }
        echo "]);";
        echo "tickMarks.push({v: $i, f: '$month'});";
      }
    ?>

        var options = {
            chartType: 'AreaChart',
            style: 'area',
            backgroundColor: 'transparent',
            chartArea: { backgroundColor: 'transparent' },
            vAxis: {
            title: 'Price (MYR)',
            titleTextStyle: {
                fontSize: 20
            },
            viewWindow: { min:0}
            },
            hAxis: {
            title: 'Month',
            titleTextStyle: {
                fontSize: 20
            },
            ticks: tickMarks
            },
            height: 400,
            isStacked: true
        };
        var chart = new google.charts.Line(document.getElementById('catchart'));
        chart.draw(data, google.charts.Line.convertOptions(options));
    }
</script>