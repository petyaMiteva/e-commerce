<?php

        function add_to_cart($id)
        {
            if(isset($_SESSION['cart'][$id]))
            {
                $_SESSION['cart'][$id]++;
                return true;
            } 
                else
                {
                    $_SESSION['cart'][$id] = 1;
                    return true;
                 }
    
                return false;
        }
        
    function update_cart()
    {
        
        foreach($_SESSION['cart'] as $id=> $quantity)
        {
            if($_POST[$id] == '0')
            {
                unset($_SESSION['cart'][$id]);
            }
            else
            {
                
                $_SESSION['cart'][$id] = $_POST[$id];
            }
        }
    }
    
    function total_items($cart)
    {
      $num_items = 0;
      
      if(is_array($cart))
      {
        
        foreach($cart as $id => $quantity)
        {
            $num_items += $quantity;
        }
      }  
        return $num_items;
    }
    
    
    function total_price($cart)
    {
        $total_price = 0.00;
        $connection = db_connect();
        
        if(is_array($cart))
        {
            foreach($cart as $id => $quantity )
            {
                $query = "SELECT price FROM products WHERE id='$id'";
                $result = mysqli_query($connection, $query);
                if($result)
                {
                    $item_price = mysqli_fetch_row($result)[0];
                    $total_price += $item_price * $quantity;
                }
            }
        }
        return $total_price;
    }
?>