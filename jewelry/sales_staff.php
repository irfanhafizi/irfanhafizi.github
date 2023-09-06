<?php 
include('check_staff.php'); 
//check if user if an administrator
$page = basename(__FILE__);
include('header_staff.php'); 
//load header content for admin page
include("connection.php"); 
// connction to database
?>

<?php
    $user_id = $_SESSION['user_id'];
    $shop= $_SESSION['shop'];
    
    if(isset($_POST["id"]))  
 {  

      if(isset($_SESSION["sales_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["sales_cart"], "stock_id");  
           if(!in_array($_POST["id"], $item_array_id))  
           {  
                $count = count($_SESSION["sales_cart"]);  
                $item_array = array(  
                     'stock_id'               =>     $_POST["id"],  
                     'name'               =>     $_POST["name"],  
                     'price'          =>     $_POST["price"],  
                );  
                $_SESSION["sales_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';   
           }  
      }  
      else  
      {  
           $item_array = array(  
                'stock_id'               =>     $_POST["id"],  
                'name'               =>     $_POST["name"],  
                'price'          =>     $_POST["price"],
           );  
           $_SESSION["sales_cart"][0] = $item_array;  
      }  
 } 

 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["sales_cart"] as $keys => $values)  
           {  
                if($values["stock_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["sales_cart"][$keys]);
                }  
           }  
      }  
 }  

 
    ?>
    <body>
<div class="container flex-wrapper">
<div class="content">
<h2 class="text-center">Search for Product</h2>
    <form name="search" method="post" action="" role="search" class="form-horizontal" style=""> 
        <div class="input-group input-group-lg" style=""> 
        <input type="text" name="search" id="live-search" placeholder="Search Product by Name" class="form-control "> 
        <span class="input-group-btn">
        <div type="" name="" id="" value="" class="btn btn-default "data-toggle="tooltip" data-placement="bottom" title="Search Product">Search</div>
        </span>
        </div> 
    </form>
    <br />
    <div id="searchresult"></div><br><br>
    <div id="livesales"></div>
   
</div> 
<!--/.content -->
</div> 
<!--/.container -->
<?php 
include('footer.php');
?>
</body>
<script>
   $(document).ready(function(){
  function sendAjaxRequest(input) {
    $.ajax({
      url: "livesearch.php",
      method: "POST",
      data: {input: input},
      success: function(data) {
        $("#searchresult").html(data);
      }
    });
  }

  // Send AJAX request when the page is loaded
  sendAjaxRequest($("#live-search").val());

  // Send AJAX request on keyup event
  $("#live-search").keyup(function(){
    sendAjaxRequest($(this).val());
  });
});

    function loadXMLDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("livesales").innerHTML =
        this.responseText;
        }
    };
    xhttp.open("GET", "livesales.php", true);
    xhttp.send();
    }

    setInterval(function(){
        loadXMLDoc();
        //1sec
    },1000);

    windows.onload = loadXMLDoc;
</script>
