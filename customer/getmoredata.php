<?php

 session_start();
 include("db.php");
 $customer_email = $_SESSION['customer_email'];

 if(isset($_POST['last_id'])){
     
     $last_id = $_POST['last_id'];
     $out = '';
    
     $sql = "SELECT * FROM history WHERE customer_email = '$customer_email' ORDER BY id DESC LIMIT $last_id,5";
     
     $res = mysqli_query($con,$sql);
     
     while ($row = mysqli_fetch_array($res)){
        $output = '';
        $history_id = $row['history_id'];
        $output.= '<tr><td>'.$row['title'].'</td>';
        $output.= '<td>'.$row['quantity'].'</td>';
        $output.= '<td>'.$row['price'].'</td>';
        $output.= '<td>'.$row['total_price'].'</td></tr>';  
        
         $out.= '<div class="alert-secondary p-2 rounded-top">
                    <form method="post">
                        <strong>Order Id:'.$history_id.'</strong>
                        <input type="hidden" name="history_id" value="'.$row['history_id'].'">
                        <button type="submit" name="view" class="btn btn-sm btn-outline-primary pull-right">View</button>
                    </form>
                </div>
                <table class="table table-dark">
             
                        <tr>
                             <td class="w-25">Book Name</td>
                             <td>Quantity</td> 
                             <td>Price</td>
                             <td>Sub-Total</td>
                        </tr>
                
                        '.$output.'
                </table>';
       

    }
     
     echo $out;
 }

?>