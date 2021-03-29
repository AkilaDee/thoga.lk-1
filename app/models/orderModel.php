<?php

require_once(__DIR__.'/../../core/db_model.php');

class orderModel extends db_model{

    public function setstaus($id){

        $sql="UPDATE orders SET status=1 WHERE order_id=".$id;

        $result=$this->connection->query($sql);

        echo "done- SQL Worked";
       
    }
    public function viewmore_farmer($id){
        $sql = "SELECT a.*, b.*,c.*, d.*, e.* from orders as a INNER join order_details as b on a.order_id=b.order_id INNER join farmer AS c ON c.farmer_id=b.farmer_id INNER join user as d on c.user_id=d.user_id INNER JOIN vegetable AS e ON e.vege_id= b.item_id where a.order_id=".$id;
        $result=$this->connection->query($sql);
        $arr=array();
        // echo $sql;
        if($result){
         while($row=mysqli_fetch_assoc($result))
         array_push($arr,$row);
          return $arr;
     
 
         }else
         echo "error in SQL";
    }
    public function viewmore_driver($id){
        $sql="SELECT a.*, b.*,c.*,e.*,x.*,f.name_en as province,g.name_en as city,i.name_en as district FROM orders as a INNER JOIN driver as b ON a.driver_id=b.driver_id INNER JOIN user as c ON b.user_id=c.user_id INNER JOIN address as e on c.user_id=e.user_id INNER JOIN provinces as f on f.id=e.province INNER JOIN cities as g on g.id=e.city INNER JOIN districts as i on i.id=e.province INNER JOIN status AS x on a.status=x.status_id WHERE a.order_id=".$id;
        $result=$this->connection->query($sql);
        $arr=array();
        // echo $sql;
        if($result){
         while($row=mysqli_fetch_assoc($result))
         array_push($arr,$row);
          return $arr;
     
 
         }else
         echo "error";
    }
    public function get_all_orders($id){
		  return $this->read('order', array('*'), array('buyer_id'=>$id));
    }


    public function get_all_for_chart(){
      $sql="Select CAST(order_date AS DATE) as count_date, count(order_date) as counted_leads from orders where order_date between (CURDATE() - INTERVAL 1 MONTH ) and CURDATE() group by order_date";
      $result=$this->connection->query($sql);
      $arr=array();
      if($result){
       while($row=mysqli_fetch_assoc($result))
       array_push($arr,$row);
     return $arr;
        }else
       echo "error";
    }

    function getdriver_upcomingorders($id){


      $sql= "SELECT * FROM  orders where orders.pickup_date>= CURRENT_TIMESTAMP AND driver_id='".$id."'";
		
      $result=$this->connection->query($sql);
      
      $finale=array();
      if($result){
          while($row=mysqli_fetch_assoc($result))
        array_push($finale,$row);
          return $finale;
      }else
      echo "error";
    
    }

    function getdriver_orderhistory($did){
      $sql= "SELECT * FROM  orders where orders.pickup_date < CURRENT_TIMESTAMP AND driver_id='".$did."'";
		
      $result=$this->connection->query($sql);
      
      $finale=array();
      if($result){
          while($row=mysqli_fetch_assoc($result))
          array_push($finale,$row);
          return $finale;
      }else
      echo "error";
    

    }


       


    function get_order_details($id){

      return $this->read('orders', array('*'), array('order_id'=>$id));
      
  }

  function  order_buyername($id){
		$sql= "SELECT a.username,a.firstname,a.lastname FROM user AS a INNER JOIN buyer AS b ON a.user_id=b.user_id INNER JOIN orders AS c ON b.buyer_id=c.buyer_id where c.order_id='".$id."'";
		
		$result=$this->connection->query($sql);
		
		$finale=array();
		if($result){
        while($row=mysqli_fetch_assoc($result))
			array_push($finale,$row);
		    return $finale;
		}else
		echo "error";

  }
  
  function  order_drivername($id){

		$sql= "SELECT a.username, a.firstname, a.lastname FROM user AS a INNER JOIN driver AS b ON a.user_id=b.user_id INNER JOIN orders AS c ON b.driver_id=c.driver_id where c.order_id='".$id."'";

		$result=$this->connection->query($sql);
		$finale=array();
		if($result){
      while($row=mysqli_fetch_assoc($result))	
			array_push($finale,$row);
		return $finale;
		}else
		echo "error";

	}

  function  orderdetails_total($orderId){
		$sql = "SELECT vegetable.vege_name, item.total_cost, order_details.weight, order_details.farmer_id, order_details.details_id, cities.name_en AS city, farmer.farm_name, districts.name_en AS district, provinces.name_en AS province, address.zip_code, address.address_line1, address.address_line2, user.firstname , user.lastname, user.contactno1 ,user.contactno2 FROM order_details INNER JOIN item on item.item_id = order_details.item_id INNER JOIN vegetable ON vegetable.vege_id= item.veg_id INNER JOIN farmer on farmer.farmer_id=order_details.farmer_id INNER JOIN address ON address.user_id=farmer.user_id INNER JOIN cities ON address.city=cities.id INNER JOIN user ON farmer.user_id=user.user_id INNER JOIN districts ON districts.id=address.district INNER JOIN provinces ON provinces.id=address.province where order_details.order_id='".$orderId."'";
		$result=$this->connection->query($sql);
		$finale=array();
		if($result){
           while($row=mysqli_fetch_assoc($result)){
			array_push($finale,$row);
		   }
		  return $finale;

		}else
		echo "error";

  }
  
  function  order_city($id){
		$sql= "SELECT a.name_en, b.* FROM districts AS a  INNER JOIN orders AS b ON a.id=b.city where b.order_id='".$id."'";
		
		$result=$this->connection->query($sql);
		
		$finale=array();
		if($result){
        while($row=mysqli_fetch_assoc($result))
			array_push($finale,$row);
		    return $finale;
		}else
		echo "error";
	}

  function insert_order($data){
    // $sql = "INSERT INTO orders(weight,total_cost,order_date,pickup_date,d_addline1,d_addline2,city,district,province,contact1,contact2,buyer_id,driver_id,status) VALUES(123,5000,CURRENT_DATE,'2020-11-17',123,'reid avenur', 'Colombo', 'Colombo', 'western prov','077123456','071123456',2,1,1);";
    return $this->create('orders',$data);


  }
  function getneworderid(){
    $sql="SELECT LAST_INSERT_ID() as id";
    $newvid=$this->queryfromsql($sql);
    return $newvid[0]['id'];
  } 

  function insert_order_details($order_details){
    return $this->create('order_details',$order_details);
  }

  function get_buyer_upcoming($id){
    $sql= "SELECT a.*,b.*,c.* FROM  orders AS a INNER JOIN driver AS b ON a.driver_id=b.driver_id INNER JOIN user as c ON b.user_id=c.user_id  where a.pickup_date>= CURRENT_TIMESTAMP AND buyer_id='".$id."' AND a.status != 4";
		
    $result=$this->connection->query($sql);
    // echo $sql;
    $finale=array();
    if($result){
        while($row=mysqli_fetch_assoc($result))
      array_push($finale,$row);
        return $finale;
    }else
    echo "error";
  }

  function getbuyer_orderhistory($id){
    $sql= "SELECT a.*,b.*,c.* FROM  orders AS a INNER JOIN driver AS b ON a.driver_id=b.driver_id INNER JOIN user as c ON b.user_id=c.user_id  where a.pickup_date < CURRENT_TIMESTAMP AND buyer_id='".$id."'";
  
    $result=$this->connection->query($sql);
    
    $finale=array();
    if($result){
        while($row=mysqli_fetch_assoc($result))
        array_push($finale,$row);
        return $finale;
    }else
    echo "error";
  

  }
  function cancelOrder($id){
    return $this->update('orders',array('status' => 4),array('order_id' => $id));

  }
  

  

    
}