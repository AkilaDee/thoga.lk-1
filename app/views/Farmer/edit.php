<html>
<head>
<title>Edit Item</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/thoga.lk/public/stylesheets/Farmer/edit.css">
<link rel="shortcut icon" href="/thoga.lk/images/thoga.jpg" type="image/x-icon">


</head>



<body>
<?php include 'navbar_dash.php';?>

<h1 class="title">Edit item here....</h1>



<div class="container">
  <form method = "get" action = "edit_item">
  <?php

    foreach($data as $keys => $row){
      $itemname = $row['vege_name'];
      $availweight = $row['avail_weight'];
      $minweight = $row['min_weight'];
      $price = $row['total_cost'];
      $itemtype = $row['item_type'];
      $itemstart = $row['item_start'];
      $itemend = $row['item_end'];
      $itemdes= $row['item_des'];

    }
  ?>

  

    <div class="row">
      <div class="left">
        <label for="iname">Item Name</label>
      </div>
      <input type="hidden" name="itemid" value="<?php echo $_GET['id']; ?>">
      <div class="right">
        <!-- <p class ="price2"> Tomato</p> -->
        <input type="text" class ="price2" name="itemname" value="<?php echo $itemname?>" disabled >
               
      </div>
    </div>
    

    <div class="row">
      <div class="left">
        <label for="aw">Available Weight (kg)</label>
      </div>
      <div class="right">
      <!-- <p class ="price2"> 200</p> -->
      <input type="text" class ="price2" name="availweight" value="<?php echo $availweight?>" >
      </div>
    </div>
    <div class="row">
      <div class="left">
        <label for="mw">Minimum Weight (kg)</label>
      </div>
      <div class="right">
      <!-- <p class ="price2"> 50</p> -->
      <input type="text" class ="price2" name="minweight" value="<?php echo $minweight?>" >
      </div>
    </div>


<div class="price_d">
    <div class="row">
      <div class="left">
        <label for="price">Price (Rs)</label>
      </div>
      <div class="right">
      <!-- <p class ="price2"> 25</p> -->
      <input type="text" class ="price2" name="price" value="<?php echo $price?>" >
      </div>
    </div>

    <div class="row">
      <div class="left">
        <label for="price">Market Price (Rs)</label>
      </div>
      <div class="right">
        
        <p class="price2">30</p>
      </div>
    </div>
</div>


    


    <div class="row">
      <div class="left">
        <label for="itype">Item Type</label>
      </div>
      <div class="right">
      <input type="text"  name="itemtype" value="<?php echo $itemtype?>" disabled >
      </div>
    </div>


    <div class="date">
      <div class="row">
        <div class="left">
          <label for="sdate">Starting Date</label>
        </div>
        <div class="right">
        <!-- <p class ="price2"type="date"> 2020-11-11</p> -->
        <input type="date" class ="price2" name="startdate" value="<?php echo $itemstart?>" readonly="readonly" >
        </div>
      </div>


      <div class="row">
        <div class="left">
          <label for="edate">Ending Date</label>
        </div>
        <div class="right">
        <!-- <p class ="price2"type="date"> 2020-11-21</p> -->
        <input type="date" class ="price2" name="enddate" value="<?php echo $itemend?>" >
        </div>
      </div>
    </div>

    

    <div class="row">
      <div class="left">
        <label for="ides">Item Description</label>
      </div>
      <div class="right">
      <!-- <p class ="price2"> good </p> -->
      <input type="text" class ="price2" name="ides" value="<?php echo $itemdes?>" >
      </div>
    </div>
    
    <br>
    <br>
    
   
    
    <!-- <div class="row">
      <div class="left">
        <label for="pic">Item Image</label>
      </div>
      <div class="right">
      <image width=150px src="/thoga.lk/public/images/Farmer/tomato.jpg">
      </div>
    </div> -->
    
    <div class="clearfix">
      <button type="button" class="cancelbtn" onClick="window.location.href='edit_item'" >Cancel</button>
      <button type="submit" class="submitbtn" name="submit">Submit</button>
    </div>

    </form>
    
  
</div> 
<br>
<br>

<?php // include("footer.php"); ?>



</body>
</html>