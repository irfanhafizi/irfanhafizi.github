<?php 
    session_start();
    include ("connection.php");
    $shop= $_SESSION['shop'];
    $page = basename(__FILE__);
?>

<table class="table  table-striped table-hover table-responsive">
                    <tr class="table-header">
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Product Vendor</th>
                        <th>Type of Product</th>
                        <th>Category</th>
                        <th>Purity</th>
                        <th>Weight(gram)</th>
                        <th>Charge</th>
                        <th>Product Price</th>
                        <?php if(($_SESSION['level'] == "admin")or($_SESSION['level'] == "manager")){ echo "<th>Tools</th>";} ?>
                        </tr>
                        <?php
                        $sql1 = mysqli_query($connection, "SELECT * FROM gold");
                        while($row = mysqli_fetch_assoc($sql1)){
                            if($row['purity'] == 916){
                                $kt22=$row['price'];
                            }else{
                                $kt18=$row['price'];
                            }
                        }

                        
                            $sql = mysqli_query($connection, "SELECT * FROM inventory 
                            JOIN category ON category.id = inventory.jewel 
                            JOIN vendor ON vendor.id = inventory.vendor_id
                            WHERE inventory.shop = '$shop' AND inventory.status = 'Available' 
                            ORDER BY inventory.name ASC"); 
                            // if no filter
                            
                            if(mysqli_num_rows($sql) == 0)
                                { 
                                    echo '<tr><td colspan="14">No data retrieved..</td></tr>';
                                    // if no data retrieved from database
                                    }
                                    else
                                    { 
                                        // if there are data
                                        $no = 1; 
                                        // start from number 1
                                        while($row = mysqli_fetch_assoc($sql))
                                        { 
                                            // fetch query into array
                                            $weight = $row['weight'];
                                            $charge = $row['charge'];
                                            $stock_id = $row['stock_id'];
                                            if($row['purity'] == 916){
                                                $price=($weight * $kt22) + $charge;
                                                $update = mysqli_query($connection, "UPDATE inventory SET price='$price' WHERE stock_id='$stock_id' AND status='Available'");
                                            }else{
                                                $price=($weight * $kt18) + $charge;
                                                $update = mysqli_query($connection, "UPDATE inventory SET price='$price' WHERE stock_id='$stock_id' AND status='Available'");
                                            }
                                            if(($_SESSION['level'] == "admin")or($_SESSION['level'] == "manager")){echo '<tr><td>'.$no.'</td><td>'.$row['name'].'</td><td>'.$row['vendor'].'</td><td>'.$row['type'].' Jewelry</td><td>'.$row['category'].'</td><td>'.$row['purity'].'</td><td>'.number_format($row['weight'],2).' gram</td><td>RM '.number_format($row['charge'],2).'</td><td>RM '.number_format($row['price'],2).'</td><td><a href="update_item.php?stock_id='.$row['stock_id'].'" title="Update Data" data-toggle="tooltip" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> <a href="inventory.php?action=delete&stock_id='.$row['stock_id'].'" title="Remove Data" data-toggle="tooltip" onclick="return confirm(\'Are you sure to remove this data for '.$row['name'].'?\')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';}
                                            else{
                                                echo '<tr><td>'.$no.'</td><td>'.$row['name'].'</td><td>'.$row['vendor'].'</td><td>'.$row['type'].' Jewelry</td><td>'.$row['category'].'</td><td>'.$row['purity'].'</td><td>'.number_format($row['weight'],2).'</td><td>RM '.number_format($row['charge'],2).'</td><td>RM '.number_format($row['price'],2).'</td></tr>';
                                            }
                                            $no++; 
                                            
                                            // next number
                                            }
                                            }
                                            ?>
                                            </table>