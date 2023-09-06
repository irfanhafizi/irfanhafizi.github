<?php 
    session_start();
    include ("connection.php");
    $shop= $_SESSION['shop'];
    $page = basename(__FILE__);

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
</table>
</div>
