<?php 
require_once './../util/initialize.php';
$route = $_POST['area'];
?>
<p style="text-align:center;font-size:25px;">ROUTE WISE CUSTOMER LIST <br/> ( <?php $data = Route::find_by_id($route); echo $data->name; ?> ) </p>
<hr/>
<table style="width:100%;">
    
    <thead>
        <tr>
            <th style='text-align:left;' >Name</th>
            <th style='text-align:left;' >Contact Number</th>
            <th style='text-align:left;' >Address</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        foreach(Customer::find_by_route_id($route) as $data1){
            echo "<tr>";
            echo "<td style='text-align:left;' >".$data1->name."</td>";
            echo "<td style='text-align:left;' >".$data1->phone."</td>";
            echo "<td style='text-align:left;' >".$data1->address."</td>";
            echo "</tr>";
        }
        
        ?>
    </tbody>
    
</table>

<script>
    window.print();
</script>