
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/thoga.lk/public/stylesheets/driver/viewmore.css">
    </head>

    <body>
    <?php //include("navbarviewmore.php"); ?>
    <header >
        
        <div class="topic">
            <h1>Order details of Order Id - <mark>   <?php echo $order_id ?>  </mark></h1>
        </div>
        <hr>

    </header> 

    <div class="left" >
        <div class="transbox">  
            <?php
                foreach($view as $keys => $row){
                    $ordid = $row['order_id'];
                    $wght = $row['weight'];
                    $ploc = $row['pickup_location'];
                    $totcost = $row['total_cost'];
                    $dloc = $row['deliver_location'];
                    $odrdate = $row['order_date'];
                    $dt = new DateTime($odrdate);
                    $date = $dt->format('Y-m-d');
                    $pickdate = $row['pickup_date'];

                }         
                            
            ?>    
            Order Id           : 
            <input type="text" "class="advancedSearchTextBox"  name="orderid" value="<?php echo $ordid?>" disabled>
            <br> 
                                 

            Weight             :
            <input type="text" name="weight" value="<?php echo $wght?>" disabled>
            <br>     

            Pickup Location    :
            <input type="text" name="pickup location" value="Anuradhapura" disabled>
            <br>

            Total Cost         :
            <input type="text" name="total cost" value="<?php echo $totcost?>" disabled>
            <br> 

            Delivery Location  :
            <input type="text" name="deliver location" value="Matale" disabled>
            <br> 

            Order Date          :
            <input type="text" name="order date" value="<?php echo $date?>" disabled>
            <br>

            Pickup Date          :
            <input type="text" name="pickup date" value="<?php echo $pickdate?>" disabled>
            <br>                  
                          
        </div> 
    </div>  
        
    
    <div class="right" >
        <div class="transbox">      
            <?php
                print_r($buyer);
                foreach($buyer as $keys => $row){
                $bname=$row['username'];
            ?>
            Buyer Name :
            <input type="text" name="buyer name" value="<?php echo $bname?>" disabled>
            <br>
                
            <?php } ?>
                   
            <?php
                       
            foreach($res as $keys => $row){
            $dname=$row['username'];

            ?>       
            Driver Name  :
            <input type="text" name="driver name" value="<?php echo $dname?>" disabled>  
            <br>


            <?php } ?>
                           
                
        </div> 
    </div>
     

	
    <div class="bottom">
        <table  align="center">
			
			<tr>
				<th>Item Name</th>
				<th>Unit Price(per Kg)</th>
				<th>Quantity(Kg)</th>
				<th>Sub Total</th>
			</tr>
			
			<?php
                $sum=0;
				
                 
                 foreach($items as $keys => $row){
					
					echo "<tr>";
					echo "<td>".$row['vege_name']."</td>";
					echo "<td>".$row['price/kg']."</td>";
					echo "<td>".$row['weight']."</td>";
					echo "<td>".$row['price/kg']*$row['weight']."</td>";
                    echo "</tr>";
                    
                    $sum=$sum+ $row['price/kg']*$row['weight'];
				}
			
			?>
			
        </table>
        <div class="fin">
            
                
            <align=\"right\"> TOTAL  </align>
            <input type="text"  class="advancedSearchTextBox1"  name="driver id" value="<?php echo $sum?>" disabled>
            
            
        </div>
    </div>
    <?php include("footer.php"); ?> 
    
    </body>
</html>